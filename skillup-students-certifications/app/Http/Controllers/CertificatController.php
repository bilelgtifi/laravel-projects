<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificat;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class CertificatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $certife = Certificat::latest()->paginate(6);
        return view('certicates')->with('certife', $certife);
    }

    public function like(Request $request)
    {
        $like_s = $request->like_s;
        $certifcate_id = $request->certifcate_id;
        $change_like = 0;
        $like = DB::table('likes')
            ->where('certificat_id', $certifcate_id)
            ->where('user_id', auth()->user()->id)->first();
        if ($like == null) {
            $new_like = new Like;
            $new_like->certificat_id = $certifcate_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 1;
            $new_like->save();
            $is_like = 1;
        } elseif ($like->like == 1) {
            DB::table('likes')
                ->where('certificat_id', $certifcate_id)
                ->where('user_id', auth()->user()->id)->delete();
            $is_like = 0;
        } elseif ($like->like == 0) {
            DB::table('likes')
                ->where('certificat_id', $certifcate_id)
                ->where('user_id', auth()->user()->id)->update(['like' => 1]);
            $is_like = 1;
            $change_like = 1;
        }
        $response = array(
            'is_like' => $is_like,
            'change_like' => $change_like,
        );

        return response()->json($response, 200);
    }

    public function dislike(Request $request)
    {
        $like_s = $request->like_s;
        $certifcate_id = $request->certifcate_id;
        $change_dislike = 0;
        $dislike = DB::table('likes')
            ->where('certificat_id', $certifcate_id)
            ->where('user_id', auth()->user()->id)->first();
        if ($dislike == null) {
            $new_like = new Like;
            $new_like->certificat_id = $certifcate_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 0;
            $new_like->save();
            $is_dislike = 1;
        } elseif ($dislike->like == 0) {
            DB::table('likes')
                ->where('certificat_id', $certifcate_id)
                ->where('user_id', auth()->user()->id)->delete();
            $is_dislike = 0;
        } elseif ($dislike->like == 1) {
            DB::table('likes')
                ->where('certificat_id', $certifcate_id)
                ->where('user_id', auth()->user()->id)->update(['like' => 0]);
            $is_dislike = 1;
            $change_dislike = 1;
        }
        $response = array(
            'is_dislike' => $is_dislike,
            'change_dislike' => $change_dislike,
        );

        return response()->json($response, 200);
    }




    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $certife = Certificat::find($id);
        return view('show')->with('certife', $certife);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id)
    {
        DB::table('certificat')
            ->where('id', $id)->delete();
        return redirect()->back();
    }
}
