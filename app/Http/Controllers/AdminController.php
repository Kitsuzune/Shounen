<?php

namespace App\Http\Controllers;

use App\Charts\TotalUser;
use App\Charts\TotalUser2Compact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\User;
use App\Models\Register;



class AdminController extends Controller
{
    


    public function docs(TotalUser $TotalUser, TotalUser2Compact $TotalUser2Compact)
    {
        Paginator::useBootstrap();
    
        return view('documentation')->with([
            'totalUser' => $TotalUser->build(),
            'totalUser2Compact' => $TotalUser2Compact->build(),
        ]);
    }

    public function dashboard(TotalUser $TotalUser, TotalUser2Compact $TotalUser2Compact)
    {
        Paginator::useBootstrap();
        $countpost = Post::count();
        $countuser = User::count();
        $users = User::latest()->get();
        $posts = Post::with('User')->latest()->get();
        return view('layout.admin', [
            'countpost' => $countpost,
            'countuser' => $countuser,
            'users' => $users,
            'posts' => $posts,
        ])-> with([
            'posts' => Post::paginate(8),
            'users' => User::paginate(2),
            'totalUser' => $TotalUser->build(),
            'totalUser2Compact' => $TotalUser2Compact->build(),
        ]);
    }

    public function postmgmt()
    {
        Paginator::useBootstrap();
        
        $users = User::latest()->get();
        $posts = Post::with('User')->latest()->get();
        return view('layout.post', [
            'users' => $users,
            'posts' => $posts,
        ])-> with([
            'posts' => Post::paginate(8),
        ]);
    }

    public function usermgmt()
    {
        Paginator::useBootstrap();
        
        $users = User::latest()->get();
        return view('layout.user', [
            'users' => $users,
        ])-> with([
            'users' => User::paginate(8),
        ]);
    }

    public function destroypost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post has been deleted');
    }

    public function destroyuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User has been deleted');
    }

    public function editpost($id)
    {
        $post = Post::findOrFail($id);
        return view('layout.edit.postedit', compact('post'));
    }

    public function updatepost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
    
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'deskripsi' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->deskripsi = $request->input('deskripsi');
        $post->save();

        return redirect()->route('postmgmt')->with('success', 'Post has been updated');
    }

    
    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('layout.edit.useredit', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'roles' => 'required',
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->roles = $request->input('roles');
        $user->save();

        return redirect()->route('usermgmt')->with('success', 'Post has been updated');
    }

    public function carousell()
    {
        return view('layout.carousell');
    }






}
