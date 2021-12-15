<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Foundation\Auth\User;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index' , 'show']]);
    }
    
    /**
     * Display a listing of the published resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')->with('posts', 
        Post::orderBy('updated_at','DESC')
        ->where('complete', 'true')
        ->get());
    }
    /**
     * Display a listing of the saved/unpublished resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saved()
    {
        return view('blog.saved')->with('posts', 
        Post::orderBy('updated_at','DESC')
        ->where('complete', 'false')
        ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'image' => 'sometimes|mimes:jpg,png,jpeg|max:5048'
        ]);

        if(empty($request['image'])){
            Post::create([
                'title' => $request->input('title'),
                'excerpt' => $request->input('excerpt'),            
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'image_path' => null,
                'complete' => $request->input('complete'),
                'user_id' => auth()->user()->id
            ]);
    
            return redirect('/blog')->with('message','Post added');
            
        } else{

        $newImageName = uniqid() .'-' .
        $request->title. $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),            
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'complete' => $request->input('complete'),
            'user_id' => auth()->user()->id
        ]);
        }

        return redirect('/blog')->with('message','Post added');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
        ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
        ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048',
        ]);

        if(empty($request['image'])){            
            Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'excerpt' => $request->input('excerpt'),            
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'complete' => $request->input('complete'),
                'user_id' => auth()->user()->id
            ]);    
        }else{
            $newImageName = uniqid() .'-' .
            $request->title. $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            
            Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'excerpt' => $request->input('excerpt'),            
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'image_path' => $newImageName,
                'complete' => $request->input('complete'),
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect('/blog')->with('message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')->with('message', 'Post deleted!');
    }
}