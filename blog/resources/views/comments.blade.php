@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Comments</b></div>
                <div class="panel-body">
                    @foreach($comments as $comment)
                        <p>
                            {{ $comment->comment }}
                            @php 
                                $u = Blog\User::find($comment->user_id); echo 'Posted by:'.' '.$u->name;
                                $p = Blog\Post::find($comment->post_id); echo 'Linked to post:'.' '.$p->post;
                            @endphp
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection