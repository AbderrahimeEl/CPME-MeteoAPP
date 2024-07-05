<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materiel;
// use App\Models\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $userCount = User::where('user_type','user')->count();
        $techCount = User::where('user_type','technicien')->count();
        $materialCount = Materiel::count();
        if (auth()->user()->user_type === 'admin') {
            return view('admin.dashboard', compact('userCount', 'materialCount','techCount'));
        }
        return view('dashboard');
    }
}
