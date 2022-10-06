<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $id = Auth::id();
        $user=User::find($id);
        return view('profile',compact('user'));
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
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'prenom' => 'required',
            'matricule' => 'required',
            'class' => 'required',
            'adresse' => 'required',
         ]);
         $id = Auth::id();
         $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->prenom = $request->prenom;
        $user->profile->matricule = $request->matricule;
        $user->profile->class = $request->class;
        $user->profile->adresse = $request->adresse;
        $user->profile->phone = $request->phone;

        if ($request->has('image')) {
            $this->validate($request,[
                'image' => 'required|image',
             ]);
            $name=$request->file('image')->getClientOriginalName();
            $newName=time().'_'.$name;
            $request->image->move('uploads/users/img',$newName);
            $user->profile->image = 'uploads/users/img/'.$newName;
        };
        $user->save();
        $user->profile->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
