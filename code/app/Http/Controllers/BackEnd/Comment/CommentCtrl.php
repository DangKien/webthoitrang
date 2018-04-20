<?php

namespace App\Http\Controllers\BackEnd\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentModel;

class CommentCtrl extends Controller
{
    public function comment(CommentModel $commentModel) {
    	$comments = $commentModel::select('created_at', "name", "email", "content", "status", "id")
    								->paginate(15);
    	return view('BackEnd.content.comment.comment', [ "comments" => $comments ]);
    }
    public function deleteComment(CommentModel $commentModel, $id){
    	$comment = $commentModel::find($id);
    	$comment->status = "DISABLE";
    	$comment->save();

    	return redirect()->back();
    }

    public function approvalComment(CommentModel $commentModel, $id){
    	$comment = $commentModel::find($id);
    	$comment->status = "AVAILABLE";
    	$comment->save();

    	return redirect()->back();
    }
}
