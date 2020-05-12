<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{

    public function index()
    {
        return Quote::all();
    }

    public function show($id)
    {
        $quote = Quote::find($id);

        if (!$quote) {

            return response(['messages'=>'id not found'],404);
        }
        return $quote;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|unique:quotes',
        ]);

        $quote = $request->user()->quotes()->create([
            'content' => $request->post('content'),
        ]);

        return $quote;
        // dd('1');
    }

    public function update(Request $request, $id)
    {
       
        $qt = Quote::find($id);

        if ($request->user()->id != $qt->user_id) {
            return response(['message'=>'dont have permissions to edit this quote'],403);
        }

        $this->validate($request, [
            'content' => 'required | unique:quotes',
        ]);

        $qt->content = $request->content;
        $qt->save();

        return $qt;
    }

    public function destroy(Request $request, $id)
    {
        $qt = Quote::find($id);

        if ($request->user()->id != $qt->user_id) {
            return response(['message'=>'dont have permissions to delete this quote'],403);
        }

        $qt->delete();
        return response(['message'=>'delete successful '],401);
    }
}