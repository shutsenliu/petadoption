<?php

namespace App\Http\Controllers;

use App\Models\fosterlist;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\each;

class FosterlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $fosterList = fosterlist::all();
        return view('home.wantadopt', compact('fosterList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("home.wantfoster");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foster = new fosterlist();
        $foster->pet_type = $request->Type;
        $foster->pet_name = $request->NickName;
        $foster->pet_variety = $request->Variety;
        $foster->pet_age = $request->Age;
        $foster->pet_gender = $request->Male;
        $foster->pet_bodytype = $request->Body;
        $foster->pet_ligation = $request->Ligation;
        $foster->pet_city = $request->City;
        //$foster->pic = $request->uploadImg;
        $foster->introduction = $request->Note;
        // 檔案上傳
        $files = $request->file('uploadImg');
        // 檢視抓到的檔案內容dd($files);
        foreach ($files as $file) {
            $foster->pic = $imageName = time() . '.' . $file->extension();
            $file->move(public_path('images'), $imageName);
        }
        $foster->save();
        return redirect("/index/fosterinformation");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function show(fosterlist $fosterlist)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function edit(fosterlist $fosterlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fosterlist $fosterlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(fosterlist $fosterlist)
    {
        //
    }



}
