<div class="panel panel-default">
    <div class="panel panel-heading">
        <a href="">{{$reply->owner->name}}</a>
        {{$reply->created_at->diffForHumans()}}
    </div>
    <div class="panel-body">
        <p>{{$reply->body}}</p>
    </div>
</div>