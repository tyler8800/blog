@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update profile data</div>
                <div class="panel-body">
                    <form action="{{ route('update') }}" method="post">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email address:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection