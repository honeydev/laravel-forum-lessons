@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($threads as $thread)
                        <h4><a href="{{$thread->path()}}">"{{$thread->title}}</h4>
                        <p>{{$thread->body}}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
