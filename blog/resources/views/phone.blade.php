@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add phone number</div>
                <div class="panel-body">
                    <form action="{{ route('phone') }}" method="post">
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="name">Phone number:</label>
                            <input type="text" class="form-control" id="name" name="number">
                            @if ($errors->has('number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">ADD</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection