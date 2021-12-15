<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //welcome screen always displays only the details and blogm posts of the first user in the DB
        $details = UserDetails::whereIn('id', [1])->get();
        $posts = Post::whereIn('user_id', [1])->get();
        
        return view('index', compact('details', 'posts' ));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userDetails.details');
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
            'welcome_message' => 'required',
            'about_me' => 'required',
            'past_work' => 'required',
            'current_work' => 'required',
            'skills' => 'required|array',
            'profile_image_path' => 'sometimes|mimes:jpg,png,jpeg|max:5048'
        ]);

        if(empty($request['profile_image_path'])){
            UserDetails::create([
                'welcome_message' => $request->input('welcome_message'),
                'about_me' => $request->input('about_me'),
                'current_work' => $request->input('current_work'),
                'past_work' => $request->input('past_work'),
                'skills' => $request->input('skills'),
                'profile_image_path' => null,
                'user_id' => auth()->user()->id
            ]);
            
        } else{
            $newImageName = uniqid() .'-' .
            $request->profile_image_path->extension();
            $request->profile_image_path->move(public_path('images'), $newImageName);

            UserDetails::create([
                'welcome_message' => $request->input('welcome_message'),
                'about_me' => $request->input('about_me'),
                'current_work' => $request->input('current_work'),
                'past_work' => $request->input('past_work'),
                'skills' => $request->input('skills'),
                'profile_image_path' => $newImageName,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect('/')->with('message','Details added');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //update 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {           
        return view('userDetails.updateDetails')
        ->with('details', UserDetails::whereIn('id', [1])->get());
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
        $request->validate([
            'welcome_message' => 'required',
            'about_me' => 'required',
            'past_work' => 'required',
            'current_work' => 'required',
            'skills' => 'required|array',
            'profile_image_path' => 'sometimes|mimes:jpg,png,jpeg|max:5048'
        ]);

        if(empty($request['profile_image_path'])){
            UserDetails::where('id', $id)
            ->update([
                'welcome_message' => $request->input('welcome_message'),
                'about_me' => $request->input('about_me'),
                'current_work' => $request->input('current_work'),
                'past_work' => $request->input('past_work'),
                'skills' => $request->input('skills'),
                'user_id' => auth()->user()->id
            ]);            
        }else{        
            $newImageName = uniqid() .'-' .
            $request->profile_image_path->extension();
            $request->profile_image_path->move(public_path('images'), $newImageName);
       
            UserDetails::where('id', $id)
            ->update([
                'welcome_message' => $request->input('welcome_message'),
                'about_me' => $request->input('about_me'),
                'current_work' => $request->input('current_work'),
                'past_work' => $request->input('past_work'),
                'skills' => $request->input('skills'),
                'profile_image_path' => $newImageName,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect('/')->with('message','Details added changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}