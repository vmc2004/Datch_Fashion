<?php

namespace App\Http\Controllers;

use App\Mail\SendCoupon;
use App\Models\Coupon;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::query()->paginate(8);
        return view('Admin.Coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupon = $request->validate([
            'code' => 'required|unique:coupons,code|max:10',
            'discount' => 'required',
            'discount_type'=> 'required|in:percent,fixed',
            'quantity' => 'required|integer|min:1',
            'max_price' => 'nullable',
            'start_date' => 'nullable|date', 
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ],[
            'code.required' => 'Mã giảm giá không được để trống.',
            'code.unique' => 'Mã giảm giá đã tồn tại.',
            'code.max' => 'Mã giảm giá không được vượt quá :max ký tự.',
            'discount.required' => 'Giá trị giảm giá không được để trống.',
            'discount_type.required' => 'Loại giảm giá không được để trống.',
            'discount_type.in' => 'Loại giảm giá chỉ được là percentage hoặc fixed.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng :min.',
            'start_date.date' => 'Ngày bắt đầu phải là định dạng ngày hợp lệ.',
            'end_date.date' => 'Ngày kết thúc phải là định dạng ngày hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
        ]);
        if ($coupon['discount_type'] === 'percent' && $coupon['discount'] > 99) {
            return back()->withErrors([
                'discount' => 'Giảm giá theo phần trăm không được vượt quá 99%.',
            ])->withInput();
        }
        Coupon::create($coupon);
        return redirect()->route('coupons.index')->with('message','Thêm mã giảm giá thành công');
    }
    public function edit(Coupon $coupon)
    {
        return view('Admin.Coupons.edit', compact('coupon'));
    }
    public function update(Request $request, Coupon $coupon)
    {
        {
            $data = $request->validate([
                'code' => 'required|unique:coupons,code,' . $coupon->id . '|max:10',
                'discount' => 'required',
                'discount_type'=> 'required|in:percent,fixed',
                'quantity' => 'required|integer|min:1',
                'start_date' => 'nullable|date', 
                'end_date' => 'nullable|date|after_or_equal:start_date',
            ],[
                'code.required' => 'Mã giảm giá không được để trống.',
                'code.unique' => 'Mã giảm giá đã tồn tại.',
                'code.max' => 'Mã giảm giá không được vượt quá :max ký tự.',
                'discount.required' => 'Giá trị giảm giá không được để trống.',
                'discount_type.required' => 'Loại giảm giá không được để trống.',
                'discount_type.in' => 'Loại giảm giá chỉ được là percentage hoặc fixed.',
                'quantity.required' => 'Số lượng không được để trống.',
                'quantity.integer' => 'Số lượng phải là một số nguyên.',
                'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng :min.',
                'start_date.date' => 'Ngày bắt đầu phải là định dạng ngày hợp lệ.',
                'end_date.date' => 'Ngày kết thúc phải là định dạng ngày hợp lệ.',
                'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            ]);
            $coupon->update($data);

            return redirect()->back()->with('success', 'Cập nhật thành công');
            
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }

    public function stateChangeCoupon(Coupon $coupon){
        if ($coupon) {
            $coupon->is_active = !$coupon->is_active;
            $coupon->save();
            return redirect()->route('coupons.index')->with('message',"Cập nhật trạng thái mã giảm giá thành công");
        }
    }
    public function send_coupon(Coupon $coupon){
        $email = User::query()->where('role' ,'member')->pluck('email');
        Mail::to($email)->send(new SendCoupon($coupon));
        return redirect()->back()->with('message', 'Email đã được gửi thành công!');
    }
  
}
