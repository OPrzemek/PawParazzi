<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myComment = Comment::all();
        return view('comments.list', ['comment' => $myComment]);
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $user = Auth::user();
        $photo = Photo::find($id);
        return view('comments.add', compact('user', 'photo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo_id' => 'required',
            'user_id' => 'required',
            'desc' => 'required',
        ]);

        if($validated){
            $comment = new Comment();
            $comment->photo_id = $request->photo_id;
            $comment->user_id = $request->user_id;
            $comment->desc = $request->desc;
            $comment->save();
            return redirect('/users/menu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myComment = Comment::find($id);
        if($myComment == null){
            $error_message = "Comment id=$id not found";
            return view('comments.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
        if($myComment->count() > 0){
            return view('comments.show', ['comment' => $myComment]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myComment = Comment::find($id);
        if($myComment == null){
            $error_message = "Comment id=".$id." not found";
            return view('comments.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if($myComment->count() > 0){
            return view('comments.edit', ['comment' => $myComment]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'photo_id' => 'required',
            'user_id' => 'required',
            'desc' => 'required',
        ]);
        if($validated){
            $comment = Comment::find($id);
            if($comment != null){
                $comment->photo_id = $request->photo_id;
                $comment->user_id = $request->user_id;
                $comment->desc = $request->desc;

                $comment->save();
                return redirect('/users/menu');
            }
            else{
                $error_message = "Comment id=$id not found";
                return view('comments.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        if($comment != null){
            $comment->delete();
            return redirect('/users/menu');
        }
        else{
            $error_message = "Comment id=$id not found";
            return view('comments.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
