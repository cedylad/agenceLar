<?php

namespace App\Http\Controllers;

use App\Models\Proprety;


class HomeController extends Controller
{
    public function index()
    {
        $propreties = Proprety::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', ['propreties' => $propreties]);
    }
}
