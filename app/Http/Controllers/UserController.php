<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show (Request $request)
    {
        return $request->user();
    }

    public function showquote(Request $request, $id)
    {
        $show = $request->user()->with('quotes')->where('id',$id)->first();
        if (!$show) {

        return response(['messages'=>'id not found'],404);
        }
        $q = $show->quotes;
        $array = [];
            foreach($q as $data){
            $array[] = [
                'id'=> $data->id,
                'user_id'=> $data->user_id,
                'content' => $data->content,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
            ];
        }
        
        return $array;
    }

}