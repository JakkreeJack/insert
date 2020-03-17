<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $animes = Anime::latest()->paginate(5);
        return view('anime.index', compact('animes'))
                ->with('i', (request()->input('page', 1) - 1) * 5);

        //$animes = Anime::all()->toArray();
        //return view('anime.index', compact('animes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          =>  'required',
            'category'      =>  'required',
            'summary'       =>  'required',
            'image'         =>  'required'
        ]);
        $animes = new Anime([
            'name'          =>  $request->get('name'),
            'category'      =>  $request->get('category'),
            'summary'       =>  $request->get('summary'),
            'image'         =>  $request->get('image')
        ]);
        
        $animes->save();//$animes คือเทเบิ้ลที่จะเอาไปเก็บ
        return redirect()->route('anime.index')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animes = Anime::find($id);
        return view('anime.edit', compact('animes', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'category'      => 'required',
            'summary'       => 'required',
            'image'         => 'required'
        ]);
        $animes = Anime::find($id);
        $animes->name       = $request->get('name');
        $animes->category   = $request->get('category');
        $animes->summary    = $request->get('summary');
        $animes->image      = $request->get('image');
        $animes->save();
        return redirect()->route('anime.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animes = Anime::find($id);
        $animes->delete();
        return redirect()->route('anime.index')->with('success', 'Data Deleted');
    }
}
