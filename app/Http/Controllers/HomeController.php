<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index() {

        $movies = (new Movie)->getHomeMovies();
        $bp = (new Movie)->movie('4');
        return view('home.index', compact('movies', 'bp'));

    }

    public function contact() {

        return view('contact.contact');
    }

    public function info() {
        $id = \Auth::id();
        $n = DB::table('users')->where('id', '=', $id)->pluck('Name');
        $email = DB::table('users')->where('id', '=', $id)->pluck('Email');
        $phone =  $name = DB::table('users')->where('id', '=', $id)->pluck('Phone');

        return view('home.info', compact('n', 'email', 'phone'));
    }
}
