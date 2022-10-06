<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);
        $input =  $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return redirect()->back();
    }
    public function delete(Request $request )
    {
        $request->validate([
            'id' => 'required'
        ]);
        $id=$request->id;
        DB::table('comments')
            ->where('id', $id)->delete();
        return redirect()->back();
    }
    

}
