<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'comments';

    public function listComment($id) {
    	return $this->select('name', 'created_at', 'content')->where('parent_id', $id)->get();
    }
}
