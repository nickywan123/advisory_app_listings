@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new listing.</div>

                <div class="card-body">
                    <form method="POST" action="{{route('listing.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="name" name="name" class="form-control" id="name" placeholder="Write a name" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="latitude" name="latitude" class="form-control" id="latitude" placeholder="Enter Latitude" value="{{old('latitude')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="longitude" name="longitude" class="form-control" id="longitude" placeholder="Enter Longitude" value="{{old('longitude')}}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                        @if(count($errors))
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
