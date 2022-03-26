<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Product;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update   = false;
        $comments = Comment::all();
        return view('adminDashboard.mangeComments',compact('comments','update'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $comments     = Comment::where('product_id',$id)->paginate(15);
       $product_name = Product::where('id',$id)->first();
       return view('adminDashboard.mangeOwnerComments',compact('comments','product_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update   = true;
        $comment  = Comment::find($id);
        $comments = Comment::paginate(10);
        return view('adminDashboard.mangeComments', compact('comments','comment', 'update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, $id)
    {
        $data = $this->validate($request, [
            "status" => 'required'
        ]);

        $comment  = Comment::find($id);
        $comment->status = $request->status;
        $comment->update();
        session()->flash('message', "The Comment status has been updated successfully");
        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        session()->flash('message', "The comment has been deleted successfully");
        return redirect()->route('comments.index');
    }
    public function addComment(StoreCommentRequest $request)
    {

        $this->validate($request, [
            'review'  => 'required',
        ]);
        Comment::create([
            "content" => $request->review,
            "user_id" => $request->user_id,
            "product_id" => $request->product_id,
        ]);

        return redirect()->route('singleProduct', $request->product_id);
    }
}
