@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Recent Jobs</h1>

            <table class="table table-hover">
                <thead>
                    <th>Company</th>
                    <th>Job Position</th>
                    <th>Job Address</th>
                    <th>Posted Date</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
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
