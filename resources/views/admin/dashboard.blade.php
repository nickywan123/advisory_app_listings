@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <h3>All Listings</h3>   
            @forelse($listings as $listing)   
            <div class="card mt-3">
                <div class="card-header"><a href="{{$listing->path()}}">{{$listing->name}}</a></div>
                <div class="card-body">
                  <p>Latitude:{{$listing->latitude}}</p>
                  <p>Longitude:{{$listing->longitude}}</p>
                </div>
            </div>
            @empty
            <p>There are no listings available.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
