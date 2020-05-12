<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = $request->user()->comments()->create([
            'body'          => $request->post('body'),
            'quote_id'      => $id,
        ]);

        return $comment;
    }
}