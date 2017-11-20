@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Posts</b></div>
                <div class="panel-body">
                    @foreach($posts as $post)
                        <p>{{ $post->post }} {{ $post->created_at->diffForHumans() }}</p> 
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add comment</div>
                <div class="panel-body">
                    
                    <form action="{{ route('comment') }}" method="post">
                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment">Comment:</label>
                            <input type="text" class="form-control" id="comment" name="comment">
                            @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Post comment</button>
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Comments</b></div>
                <div class="panel-body">
                    @foreach($comments as $comment)
                        <p>{{ $comment->comment }} {{ $comment->created_at->diffForHumans() }}</p> 
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</div>
@endsection