@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        @if (session('info'))
            <div class="alert alert-success">{{session('info')}}</div>
        @endif
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{$article['title']}}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{$article->created_at->diffForHumans()}},
                    Category : {{$article->category->name}}
                </div>
                <p class="card-text">{{$article['body']}}</p>
                <a class="btn btn-danger" href="{{url("/articles/delete/$article->id")}}">Delete</a>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">Comments : {{count($article->comments)}}</li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{url("/comments/delete/$comment->id")}}" class="float-end btn-close"></a>
                    {{$comment->content}}
                    <div class="small mt-2">
                        <b>By   : {{$comment->user->name}}</b> {{$comment->created_at->diffForHumans()}}
                    </div>
                    <div class="small text-muted">
                        
                    </div>
                </li>
            @endforeach
        </ul>
        @auth
            <form action="{{url('/comments/add')}}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <textarea name="content" class="form-control" placeholder="New comment"></textarea>
                <input type="submit" class="btn btn-primary" value="Add Comment">
            </form>
        @endauth
    </div>
@endsection