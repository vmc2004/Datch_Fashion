<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::query()->with('user','product')->paginate('9');
        return view('Admin.comments.index',compact('comments'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function sendComment(StoreCommentRequest $request, $product_id)
    {
        
        $user_id = Auth::user()->id;
        Comment::query()->create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
        return redirect()->back()->with('message','Bình luận sản phẩm thành công!');
    }

    public function sendRate(StoreCommentRequest $request, $product_id)
    {
        $user_id = Auth::user()->id;
        Comment::query()->create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);
        return redirect()->route('rate.list')->with('message','Đánh giá sản phẩm thành công!');
    }

    public function listRate(){
        $listRate = Comment::query()->where('user_id',Auth::user()->id)->where('rating','!=',null)->with('product')->paginate(6);
        return view('Client.comment.myRate',compact('listRate'));
    }

    public function form($variant_id)
    {
        $variant = ProductVariant::query()->where('id',$variant_id)->with(['size','color','product'])->first();
        return view('Client.comment.sendRate',compact('variant'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('Admin.comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request,$id)
    {
        
        $comment = Comment::find($id);
        $comment->status = $request->input('status');
        $comment->save();
        return redirect()->route('comments.index')->with('message','cập nhật trạng thái thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
