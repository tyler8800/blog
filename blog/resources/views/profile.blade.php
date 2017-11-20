@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <p>Profile data</p>
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="{{ Auth::user()->image }}" alt="Card image" width="200px" height="200px">
                        <div class="card-body">
                            <h4 class="card-title"><b>Your name:</b> {{ Auth::user()->name }}</h4>
                            <p class="card-text"><b>Your email:</b> {{ Auth::user()->email }}</p>
                            <p class="card-text"><b>Your phone number:</b> {{ $number }}</p>
                            <a href="{{ route('update') }}" class="btn btn-primary">Change profile data</a>
                            <a href="{{ route('image') }}" class="btn btn-primary">Change profile picture</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection