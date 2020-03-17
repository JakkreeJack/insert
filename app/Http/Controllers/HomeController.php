<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
class HomeController extends Controller
{
    public function index()
    {
        $animes = Anime::latest()->paginate(5);
        return view('home', compact('animes'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
