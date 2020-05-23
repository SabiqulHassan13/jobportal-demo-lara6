@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post a Job</div>

                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="title">Job Title</label>
                            <input type="text" class="form-control" name="title" id="title" >
                        </div>
                        <!-- Laravel Error Exception -->
                        @if($errors->has('title'))
                            <div class="alert alert-danger">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="roles">Job Roles</label>
                            <input type="text" class="form-control" name="roles" id="roles" >
                        </div>
                        <div class="form-group">
                            <label for="description">Job Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="position">Job Position</label>
                            <input type="text" class="form-control" name="position" id="position">
                        </div>
                        <div class="form-group">
                            <label>Job Category</label>
                            <select class="form-control" name="category_id">
                                <option>Select a category</option>
                                @foreach(App\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Job Type</label>
                            <select class="form-control" name="type">
                                <option>Select a type for job</option>
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                                <option value="casual">Casual</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Job Status</label>
                            <select class="form-control" name="status">
                                <option>Select a status for job</option>
                                <option value="live">Live</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="last_date">Apply Deadline</label>
                            <input type="date" class="form-control" name="last_date" id="last_date" >
                        </div>
                        
                        <button type="submit" class="btn btn-outline-primary btn-block btn-sm">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
