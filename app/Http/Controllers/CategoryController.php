<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Anime;


class CategoryController extends Controller
{
    public function action()
    {

        $animes = Anime::where('category','Action')->paginate(3);
        return view('category.action', ['animes' => $animes]);
        /*
        $animes = DB::table('users')->paginate(5);

        return view('category.action', ['animes' => $animes]);
    
        /*
        return view('anime.index', compact('animes'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        */
        

        /*
   $animes = Anime::latest()->paginate(5);
        return view('anime.index', compact('animes'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
           */ 
    }
    public function adventure()
    {
        $animes = Anime::where('category','Adventure')->paginate(3);
        return view('category.adventure', ['animes' => $animes]);
    }

    public function fantasy()
    {
        $animes = Anime::where('category','Fantasy')->paginate(3);
        return view('category.fantasy', ['animes' => $animes]);
    }

    public function drama()
    {
        $animes = Anime::where('category','Drama')->paginate(3);
        return view('category.drama', ['animes' => $animes]);
    }

    public function game()
    {
        $animes = Anime::where('category','Game')->paginate(3);
        return view('category.drama', ['animes' => $animes]);
    }

    public function magic()
    {
        $animes = Anime::where('category','Magic')->paginate(3);
        return view('category.magic', ['animes' => $animes]);

    }

}
