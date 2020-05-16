@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
                <img src="{{ asset('avatar/company_logo.png') }}" style="width: 100%" width="150" height="200">
            @else
                <img src="{{ asset('uploads/logo/' . Auth::user()->company->logo) }}" style="width: 100%" width="150" height="200">
            @endif

            <br><br>
            <div class="card">
                <div class="card-header">Update Your Company Logo</div>
                <div class="card-body">
                    <form action="{{ route('company.logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <input type="file" class="form-control-file" id="logo" name="logo">
                            <!-- Laravel Error Exception -->
                            @if($errors->has('logo'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('logo') }}
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

                    <form action="{{ route('company.store') }}" method="POST">
                        @csrf 

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->company->address }}</textarea>
                            <!-- Laravel Error Exception -->
                            @if($errors->has('address'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" name="phone" value="{{ Auth::user()->company->phone }}">
                             <!-- Laravel Error Exception -->
                             @if($errors->has('phone'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input class="form-control" id="website" name="website" value="{{ Auth::user()->company->website }}">
                             <!-- Laravel Error Exception -->
                             @if($errors->has('website'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('website') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input class="form-control" id="slogan" name="slogan" value="{{ Auth::user()->company->slogan }}">
                             <!-- Laravel Error Exception -->
                             @if($errors->has('slogan'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('slogan') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ Auth::user()->company->description }}</textarea>
                            <!-- Laravel Error Exception -->
                            @if($errors->has('description'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('description') }}
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
                <div class="card-header">Company Information</div>
                <div class="card-body">
                    <p><b>Company Name: </b>{{ Auth::user()->company->name }}</p>
                    <p><b>Company Email: </b>{{ Auth::user()->email }}</p>
                    <p><b>Company Phone: </b>{{ Auth::user()->company->phone }}</p>
                    <p><b>Company Website: </b>{{ Auth::user()->company->website }}</p>
                    <p><b>Company Slogan: </b>{{ Auth::user()->company->slogan }}</p>
                    <p><b>Company Description: </b>{{ Auth::user()->company->description }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Cover Photo</div>
                <div class="card-body">
                    <form action="{{ route('company.coverphoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <input type="file" class="form-control-file" id="cover_photo" name="cover_photo">
                            <!-- Laravel Error Exception -->
                            @if($errors->has('cover_photo'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('cover_photo') }}
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
