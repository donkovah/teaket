<?php

namespace Donkovah\Teaket\Traits;

use Donkovah\Teaket\Model\Teaket;
use Donkovah\Teaket\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CommentServiceTrait
{
   /**
     * get all comments for a particular ticket from DB or cloud
    */
    public function index(Teaket $teaket)
    {
        $teaket->load('comments');
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
            'teaket' => $teaket,
            'status' => 200
            ]);
        }

    }

    /**
     * store comment
    */
    public function store(Request $request, Teaket $teaket)
    {
        $request->validate([
            'body' => 'required',
        ]);
        $comment = new Comment;
        $comment->comment = $request->body;
        $comment->user_id = Auth::id();
        $comment->edited_at = null;
        $teaket->comments()->save($comment);
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teaket' => $teaket,
                'status' => 200
            ]);
        }
        //return to previous URL
        return back();
    }

    /**
     * update comment
     * you can only update your comment within 1 minute after you created it.
    */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required'
        ]);
        $comment->body = $request->body;
        $comment->save();
        return response()->json([
            'comment' => $comment,
            'status' => 200
        ]);
        return back();
    }
 
    /**
     * send notifications via specific chanells
    */
    public function notifyTeaketMembers(Teaket $teaket)
    {
        $users = $teaket->users;
        // $users->notify;
    }

    public function checkNew(Comment $comment)
    {
        $teaket = $comment->commentable;
        $lastComment = $teaket->comments->last();
        if ($lastComment->id == $comment->id) {
            return response()->json([
                'status' => 201
            ]);
        }
        return response()->json([
            'status' => 200
        ]);
    }
}