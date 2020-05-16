<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Company $company)
    {

        return view('site.companies.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.companies.create');
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
            'phone'         => 'required|min:11|numeric',
            'website'       => 'required',
            'slogan'        => 'required',
            'description'   => 'required',
        ]);

        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address'       =>  request('address'),
            'phone'         =>  request('phone'),
            'website'       =>  request('website'),
            'slogan'        =>  request('slogan'),
            'description'   =>  request('description'),
        ]);

        return redirect()->back()->with('message', 'Your Company profile has been successfully upadated');
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

    // upload coverPhoto
    public function coverPhoto(Request $request) {
        $request->validate([
            'cover_photo'  => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('cover_photo')) {
            $file = $request->file('cover_photo');
            $fileExtension = $file->extension();
            $fileName = time() . "." . $fileExtension; 

            $file->move('uploads/cover_photo', $fileName);
        }

        Company::where('user_id', $user_id)->update([
            'cover_photo' => $fileName,
        ]);

        return redirect()->back()->with('message', 'Cover Photo has been successfully upadated');
    }

    // upload logo
    public function logo(Request $request) {
        $request->validate([
            'logo'  => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileExtension = $file->extension();
            $fileName = time() . "." . $fileExtension; 

            $file->move('uploads/logo', $fileName);
        }

        Company::where('user_id', $user_id)->update([
            'logo' => $fileName,
        ]);

        return redirect()->back()->with('message', 'Logo has been successfully upadated');
    }


}
