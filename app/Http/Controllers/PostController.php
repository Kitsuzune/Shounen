<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Session;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Redirect;
use \Cviebrock\EloquentSluggable\Services\SlugService;



class PostController extends Controller
{

    public function tampil(){
        $mypost = auth()->user()->post()->get();
        return view('mypost',[
            'posts' => $mypost
        ]);
    }

    public function edittampil(Post $post){
        return view('editpost',[
            'post' => $post
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $validasi = $request->validate([
            'title' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'image' => 'image|file|max:5000|required',
            'slug' => 'required|unique:posts'
        ]);

       

        if($request->file('image')){
            $validasi['image'] = $request->file('image')->store('post-image');
        }

        
        $post = new Post;

        $post->title = $request->title;
        $post->deskripsi = $request->deskripsi;
        $post->image = $validasi['image'];
        $post->slug = $request->slug;
        $post->user_id = auth()->user()->id;

        
        $post->save();
        Session::flash('hasil','berhasil');
        
        // post::create($validasi);

        


        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'deskripsi' => 'required|max:255',
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validasi = $request->validate($rules);

        $validasi['user_id'] = auth()->user()->id;

        Post::where('id',$post->id)->update($validasi);

        Session::flash('hasil','berhasil update');

        return redirect('/user/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect()->back()->with('hasil','berhasil');
    }

    public function buatslug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}


