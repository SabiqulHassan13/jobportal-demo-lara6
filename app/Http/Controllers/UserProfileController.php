<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.profiles.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address'       => 'required',
            // 'phone_number'  => 'required|regex:/(01)[0-9](9)/',
            'phone_number'  => 'required|min:11|numeric',
            'experience'    => 'required|min:10',
            'bio'           => 'required|min:10',
        ]);

        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address'       =>  request('address'),
            'phone_number'  =>  request('phone_number'),
            'experience'    =>  request('experience'),
            'bio'           =>  request('bio'),
        ]);

        return redirect()->back()->with('message', 'Your profile has been successfully upadated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    // upload cover letter
    public function coverLetter(Request $request) {
        $request->validate([
            'cover_letter'  => 'required|mimes:pdf,doc,docx|max:20000',
        ]);

        $user_id = auth()->user()->id;
        $file = $request->file('cover_letter')->store('public/files');

        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $file,
        ]);

        return redirect()->back()->with('message', 'Cover Letter has been successfully upadated');

    }
    // upload resume
    public function resume(Request $request) {
        $request->validate([
            'resume'  => 'required|mimes:pdf,doc,docx|max:20000',
        ]);

        $user_id = auth()->user()->id;
        $file = $request->file('resume')->store('public/files');

        Profile::where('user_id', $user_id)->update([
            'resume' => $file,
        ]);

        return redirect()->back()->with('message', 'Resume has been successfully upadated');

    }
    // upload avatar
    public function avatar(Request $request) {
        $request->validate([
            'avatar'  => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileExtension = $file->extension();
            $fileName = time() . "." . $fileExtension; 

            $file->move('uploads/avatar', $fileName);
        }

        Profile::where('user_id', $user_id)->update([
            'avatar' => $fileName,
        ]);

        return redirect()->back()->with('message', 'Avatar has been successfully upadated');

    }
}
