<?php

namespace App\Http\Controllers;

use App\Mail\SendCoupon;
use App\Models\Coupon;
use App\Models\User;
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
        $coupon = $request->all();
        // dd($coupon);
        Coupon::query()->create($coupon);
        return redirect()->route('coupons.index')->with('message','Thêm mã giảm giá thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('Admin.Coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        {
            $data = $request->all();

            $coupon->update($data);

            return redirect()->back()->with('message', 'Cập nhật thành công');
            
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
        $email = User::query()->where('role' ,'admin')->pluck('email');
        Mail::to($email)->send(new SendCoupon($coupon));
        return redirect()->back()->with('message', 'Email đã được gửi thành công!');
    }
}
