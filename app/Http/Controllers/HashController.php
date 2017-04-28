<?php

namespace App\Http\Controllers;

use App\Hash;
use App\Http\Requests\HashValue;
use App\Http\Requests\LookupHash;
use Illuminate\Http\Request;

class HashController extends Controller
{
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
        return view('hash');
    }

    /**
     * Hash a text value
     *
     * @param HashValue $request
     * @return \Illuminate\Contracts\View\View
     */
    public function store(HashValue $request)
    {
        $input = $request->input();
        //Hash first, THEN query based on the hash since we can't make TEXT columns a unique index
        $md5 = md5($input['text']);
        $hash = Hash::firstOrCreate(['hash'=>$md5]); //Queries went from ~4 Seconds +/- to a few ms doing it this way.
        $hash->hash = $md5;
        $hash->hashed_times+=1;
        $hash->hashed_at = date('Y-m-d H:i:s');
        $hash->text = $input['text'];
        $hash->save();
        return view('hash')->with('hash',$hash);
    }

    /**
     * Show the form for locating a hash
     */
    public function lookup()
    {
        return view('lookup');
    }

    /**
     * Lookup a hashed value
     *
     * @param LookupHash $request
     * @return \Illuminate\Contracts\View\View
     */
    public function show(LookupHash $request)
    {
        $input = $request->input();
        $md5 = $input['hash'];

        $hash = Hash::where(['hash'=>$md5])->first();

        if(!empty($hash->id)) {
            $hash->queried_times+=1;
            $hash->queried_at = date('Y-m-d H:i:s');
            $hash->save();
            return view('lookup')->with('hash',$hash);
        }

        return view('lookup')->withErrors(['Unable to locate that hash in our database.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
