<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificat;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;

class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }
    public function dashboard()
    {
        if (auth()->user()->role == "user") {
            return redirect()->route('welcome');
        }
        $users = User::latest()->paginate(10);
        $nb_user = User::all()->where('role', 'user')->count();
        $nb_admin = User::all()->where('role', 'admin')->count();
        $nb_certife = Certificat::all()->count();
        $nb_like = Like::all()->where('like', 1)->count();
        $nb_dislike = Like::all()->where('like', 0)->count();
        $nb_comment = Comment::all()->count();
        return view('admin.dashboard', compact('users'))->with([
            'nb_user' => $nb_user,
            'nb_admin' => $nb_admin,
            'nb_certife' => $nb_certife,
            'nb_like' => $nb_like,
            'nb_dislike' => $nb_dislike,
            'nb_comment' => $nb_comment,
        ]);
    }


    public function store_certife(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'categorie' => 'required',
            'description' => 'required',
            'levele' => 'required',
            'prix' => 'required'
        ]);
        $input =  $request->all();
        Certificat::create($input);
        return redirect()->back();
    }
    public function find_user(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
        ]);
        $nb_user = User::all()->where('role', 'user')->count();
        $nb_admin = User::all()->where('role', 'admin')->count();
        $nb_certife = Certificat::all()->count();
        $nb_like = Like::all()->where('like', 1)->count();
        $nb_dislike = Like::all()->where('like', 0)->count();
        $nb_comment = Comment::all()->count();

        $name =  $request->user_name;
        $users = User::latest()->where('name', $name)->paginate(10);
        // $users = User::all()->where('name', $name)->paginate(10);
        return view('admin.find', compact('users'))->with([
            'nb_user' => $nb_user,
            'nb_admin' => $nb_admin,
            'nb_certife' => $nb_certife,
            'nb_like' => $nb_like,
            'nb_dislike' => $nb_dislike,
            'nb_comment' => $nb_comment,
        ]);
    }
    public function delete_users(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $id =  $request->user_id;
        User::where('id', $id)->delete();
        return redirect()->back();
    }

    public function down(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $id =  $request->user_id;
        $user = User::find($id);
        $role = "user";
        $user->role = $role;
        $user->save();
        return redirect()->back();
    }
    public function up(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $id = $request->user_id;
        $user = User::find($id);
        $role = "admin";
        $user->role = $role;
        $user->save();
        return redirect()->back();;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'categorie' => 'required',
            'description' => 'required',
            'levele' => 'required',
            'prix' => 'required'
        ]);
        $id = $request->id;
        $Certificat = Certificat::find($id);
        $Certificat->title = $request->title;
        $Certificat->categorie = $request->categorie;
        $Certificat->description = $request->description;
        $Certificat->levele = $request->levele;
        $Certificat->prix = $request->prix;

        $Certificat->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
}
