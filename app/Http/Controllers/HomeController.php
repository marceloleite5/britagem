<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function dashboard()
    {
        //$user = auth()->user();
        $users = User::all();

        return view('dashboard.painel', ['users' => $users]);
    }


}
