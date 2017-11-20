@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload multiple files</div>
                <div class="panel-body">
                    <form action="{{ route('files') }}" method="post" enctype="multipart/form-data">
                        <input type="file" name="images[]" multiple>
                        <input type="submit" value="Upload files">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection