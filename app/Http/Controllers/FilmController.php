<?php

namespace App\Http\Controllers;

use App\Category;
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
        $category = Category::all();
        return view('films.film', ['films' => $film], ['category' => $category]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
       $film = Film::find($id);
       $cat = Category::all();
       return view('films.show', ['film' => $film], ['category' => $cat]);
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addToFavorite($id){
        $film = Film::find($id);
        $film->favorites()->attach(\Illuminate\Support\Facades\Auth::user()->id);
        return back();

    }
    public function deleteFromFavorite($id){
        $film = Film::find($id);
        $film->favorites()->detach(\Illuminate\Support\Facades\Auth::user()->id);
        return back();
    }


}
