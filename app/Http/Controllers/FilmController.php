<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $film = Film::all();
        return view('films.film', ['films' => $film]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
       $film = Film::find($id);
       return view('films.show', ['film' => $film]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('film.create');
    }
}
