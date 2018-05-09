@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="/threads">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="title" placeholder="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="body" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Create!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
