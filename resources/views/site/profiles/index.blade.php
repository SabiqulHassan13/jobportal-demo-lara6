@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))
                <img src="{{ asset('avatar/company_logo.png') }}" style="width: 100%" width="150" height="200">
            @else
                <img src="{{ asset('uploads/avatar/' . Auth::user()->profile->avatar) }}" style="width: 100%" width="150" height="200">
            @endif

            <br><br>
            <div class="card">
                <div class="card-header">Update Your Avatar</div>
                <div class="card-body">
                    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <input type="file" class="form-control-file" id="avatar" name="avatar">
                            <!-- Laravel Error Exception -->
                            @if($errors->has('avatar'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('avatar') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update your information</div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf 

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->profile->address }}</textarea>
                            <!-- Laravel Error Exception -->
                            @if($errors->has('address'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Phone Number</label>
                            <input class="form-control" id="phone_number" name="phone_number" value="{{ Auth::user()->profile->phone_number }}">
                             <!-- Laravel Error Exception -->
                             @if($errors->has('phone_number'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <textarea class="form-control" id="experience" name="experience" rows="3">{{ Auth::user()->profile->experience }}</textarea>
                            <!-- Laravel Error Exception -->
                            @if($errors->has('experience'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('experience') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio Data</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3">{{ Auth::user()->profile->bio }}</textarea>
                            <!-- Laravel Error Exception -->
                            @if($errors->has('bio'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('bio') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User Information</div>
                <div class="card-body">
                    <p><b>Name:</b> {{ Auth::user()->name }}</p>
                    <p><b>Email:</b> {{ Auth::user()->email }}</p>
                    <p><b>Address:</b> {{ Auth::user()->profile->address }}</p>
                    <p><b>Phone Number:</b> {{ Auth::user()->profile->phone_number }}</p>
                    <p><b>Experience:</b> {{ Auth::user()->profile->experience }}</p>
                    <p><b>Biodata:</b> {{ Auth::user()->profile->bio }}</p>
                    <p><b>Member Since:</b> {{ date('F d Y', strtotime(Auth::user()->created_at)) }}</p>

                    @if(!empty(Auth::user()->profile->cover_letter))
                        <p><b>Cover Letter:</b> 
                            <a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">download here</a>
                        </p>
                    @else
                        <p>Please upload your Cover Letter</p>
                    @endif

                    @if(!empty(Auth::user()->profile->resume))
                        <p><b>Resume:</b>
                            <a href="{{ Storage::url(Auth::user()->profile->resume) }}">download here</a>
                        </p>
                    @else
                        <p>Please upload your Resume</p>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Cover Letter</div>
                <div class="card-body">
                    <form action="{{ route('profile.coverletter') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <input type="file" class="form-control-file" id="cover_letter" name="cover_letter">
                            <!-- Laravel Error Exception -->
                            @if($errors->has('cover_letter'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('cover_letter') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>                
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Resume</div>
                <div class="card-body">
                    <form action="{{ route('profile.resume') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <input type="file" class="form-control-file" id="resume" name="resume">
                            <!-- Laravel Error Exception -->
                            @if($errors->has('resume'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('resume') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
