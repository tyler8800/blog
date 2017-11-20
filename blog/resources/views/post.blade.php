@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create post</div>
                <div class="panel-body">
                    <form action="{{ route('post') }}" method="post">
                        <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                            <label for="post">Post:</label>
                            <input type="text" class="form-control" id="post" name="post">
                            @if ($errors->has('post'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('post') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

        <!-- 

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>All posts</b></div>
                <div class="panel-body">
                    @foreach($posts as $post)
                        <p>
                            <a href="#">{{ $post->post }}</a> {{ $post->created_at->diffForHumans() }}
                            @php $u = Blog\User::find($post->user_id); echo 'Posted by'.' '.$u->name; @endphp
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        -->

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>All posts</b></div>
                <div class="panel-body">
                    @foreach($posts as $post)
                        @php $user = Blog\User::find($post->user_id); @endphp
                        <div class="media">
                            <img class="mr-3" src="/{{ $user->image }}" width="50px" height="50px" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $post->created_at->diffForHumans() }}</h5>
                                    {{ $post->post }}
                                    {{ $user->name }}
                            </div>
                        </div>

                        <form action="{{ route('post.comment') }}" method="post">
                            <div class="form-group{{ $errors->has('co') ? ' has-error' : '' }}">
                                <label for="co">Comment:</label>
                                <input type="text" class="form-control" id="co" name="co">
                                @if ($errors->has('co'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('co') }}</strong>
                                    </span>
                                @endif
                                <input type="hidden" name="id" value="{{ $post->id }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                            {{ csrf_field() }}
                        </form>
                        <br><br>

                        @php
                            $comments = Blog\Post::find($post->id)->comments;
                            foreach($comments as $comment){
                                $user_data = Blog\User::find($comment->user_id);
                                echo "<p>".$comment->comment." "."By: ".$user_data->name." ".$comment->created_at->diffForHumans()."</p>";
                            }
                        @endphp

                        <hr>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


