@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
    <div class="row">
        <div class="company-profile">
            <img src="{{ asset('avatar/company_banner2.jpg') }}" width="100%">
        
        </div>
        <div class="company-desc">
            <br>
            <img src="{{ asset('avatar/company_logo.png') }}" width="100">
            <h2>Company Name: {{ $company->name }}</h2>
            <p>Company Description: {{ $company->description }}</p>
            <p><b>Slogan: </b>{{ $company->slogan }}</p>
            <p><b>Address: </b>{{ $company->address }}</p>
            <p><b>Phone: </b>{{ $company->phone }}</p>
            <p><b>Website: </b>{{ $company->website }}</p>
        </div>
        <div class="company-related-job">
            <table class="table table-hover">
                <thead>
                    <th>Company</th>
                    <th>Job Position</th>
                    <th>Job Address</th>
                    <th>Posted Date</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($company->jobs as $job)
                    <tr>                     
                        <td>
                            <img src="{{ asset('avatar/company_logo.png') }}" width="80">                    
                        </td>
                        <td>
                            Position: {{ $job->position }}
                            <br>
                            Job Type: <i class="fa fa-clock"></i>&nbsp;{{ $job->type }}
                        </td>
                        <td>
                            <i class="fa fa-map-marker"></i>&nbsp;Address: {{ $job->address }}
                        </td>
                        <td>
                            Posted Date: <i class="fa fa-calendar-check"></i>&nbsp;{{ $job->created_at->diffForHumans() }}
                        </td>
                        <td>
                            <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="btn btn-success btn-sm">Apply</a>
                        </td>
                    </tr> 
                @endforeach  
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection
