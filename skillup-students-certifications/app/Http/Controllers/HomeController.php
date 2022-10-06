<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificat;

class HomeController extends Controller
{

    public function index()
    {

        if (Auth::user()) {
            $user = Auth::user();
            if ($user->profile == null) {
                $profile = Profile::create([
                    'prenom' => '',
                    'user_id' => Auth::id(),
                    'matricule' => '',
                    'class' => '',
                    'adresse' => '',
                    'phone' => 0,
                ]);
            }
        }

        $certife = Certificat::latest()->paginate('10');
        $popularcertife = Certificat::all()->where('levele', 'advanced');
        return view('welcome', compact('certife'))->with('popularcertife', $popularcertife);
    }
    public function aboute()
    {
        return view('aboute');
    }
}
