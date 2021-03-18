@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">       
            <div class="card">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                            {{$listing->name}}
                        </span>        
                        <a href="{{route('listing.edit',[$listing])}}" class="btn btn-link">Edit Listing</a>
                        <form action="{{route('listing.destroy',[$listing])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-link" type="submit">Delete Listing</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                  <p>Latitude:{{$listing->latitude}}</p>
                  <p>Longitude:{{$listing->longitude}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
