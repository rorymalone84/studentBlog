<?php

namespace App\Http\Controllers;

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
        //welcome screen always displays only the details of the first user in the DB
        
        return view('index')->with('details', UserDetails::whereIn('id', [1])->get());
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
        ]);     

        UserDetails::create([
            'welcome_message' => $request->input('welcome_message'),
            'about_me' => $request->input('about_me'),
            'current_work' => $request->input('current_work'),
            'past_work' => $request->input('past_work'),
            'skills' => $request->input('skills'),
            'user_id' => auth()->user()->id
        ]);

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
        ]);     

        UserDetails::where('id', $id)
        ->update([
            'welcome_message' => $request->input('welcome_message'),
            'about_me' => $request->input('about_me'),
            'current_work' => $request->input('current_work'),
            'past_work' => $request->input('past_work'),
            'skills' => $request->input('skills'),
            'user_id' => auth()->user()->id
        ]);

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