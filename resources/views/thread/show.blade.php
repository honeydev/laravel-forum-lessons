@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <article>
                        <h4>{{$thread->title}}</h4>
                        <p>{{$thread->body}}</p>
                        <h5>Author: {{$thread->creator->name}}</h5>
                        <hr>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($thread->replies as $reply)
                @include('thread.reply');
            @endforeach
        </div>
    </div>
    @if(auth()->check())
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form method="POST" action="{{ route('post.reply', [$thread->channel->id, $thread->id]) }}">
            <div class="form-group">
                {{csrf_field()}}
                <textarea name="body" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Post!</button>
        </form>
    @endif
    </div>
    </div>
</div>
@endsection
