<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
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
            'welcome-message' => 'required',
            'about-me' => 'required',
            'past-work' => 'required',
            'current-work' => 'required',
            'skills' => 'required|array',
        ]);

        UserDetails::create([
            'welcome-message' => $request->input('welcome-message'),
            'about-me' => $request->input('about-me'),
            'current-work' => $request->input('current-work'),
            'past-work' => $request->input('past-work'),
            'skills' => $request->input('skills'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message','Details added');
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
        return view('updateDetails.details');
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
        //
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