<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $pageTitle = 'Login Administrativo';
        return view('pages.admin.login', compact('pageTitle'));
    }
}
