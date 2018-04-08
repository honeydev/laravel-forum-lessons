@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <article>
                        <h4>{{$thread->titlle}}</h4>
                        <p>{{$thread->body}}</p>
                        <hr>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($thread->replies as $reply)
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <a href="">{{$reply->owner->name}}</a>
                        {{$reply->created_at->diffForHumans()}}
                    </div>
                    <div class="panel-body">
                        <p>{{$reply->body}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
