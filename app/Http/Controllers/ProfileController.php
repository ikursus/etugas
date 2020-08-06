<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('template_pengguna.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$data = $request->except('password');

    	if (!empty($request->input('password')) && !is_null($request->input('password')))
    	{
    		$data['password'] = bcrypt($request->input('password'));
    	}

    	auth()->user()->update($data);

    	return redirect()->route('profile.edit')->with('mesej-sukses', 'Rekod berjaya dikemaskini');
    }
}
