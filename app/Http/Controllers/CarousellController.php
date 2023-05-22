<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarousellRequest;
use App\Http\Requests\UpdateCarousellRequest;
use App\Models\Carousell;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use \Cviebrock\EloquentSluggable\Services\SlugService;



class CarousellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousell = Carousell::all();
        return view('layout.carousell', [
            'carousells' => $carousell,
        ]);
    }

    public function edittampil(Carousell $carousell){
        return view('layout.edit.carouselledit',[
            'carousell' => $carousell
        ]);
    }
    

    public function upload()
    {
        return view('layout.carousellup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarousellRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validasi = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:10000|required|mimes:jpeg,jpg,png,gif',
            'slug' => 'required|unique:posts'
        ]);

       

        if($request->file('image')){
            $validasi['image'] = $request->file('image')->store('carousell-image');
        }

        
        $carousell = new Carousell;

        $carousell->title = $request->title;
        $carousell->image_path = $validasi['image'];
        $carousell->slug = $request->slug;

        
        $carousell->save();
        Session::flash('hasil','berhasil');
        
        // post::create($validasi);

        


        return Redirect::to('dashboard/carousell');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousell  $carousell
     * @return \Illuminate\Http\Response
     */
    public function show(Carousell $carousell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousell  $carousell
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousell $carousell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarousellRequest  $request
     * @param  \App\Models\Carousell  $carousell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousell $carousell)
    {
        $rules = [
            'title' => 'required|max:255',
        ];

        if($request->slug != $carousell->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validasi = $request->validate($rules);

        Carousell::where('id',$carousell->id)->update($validasi);

        Session::flash('hasil','berhasil update');

        return redirect('/dashboard/carousell');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousell  $carousell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousell $carousell)
    {
        Carousell::destroy($carousell->id);

        return redirect()->back()->with('success', 'Carousell has been deleted');

    }
}
