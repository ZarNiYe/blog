@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form method="post">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control mb-2">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control mb-2"></textarea>
            <div class="mb-3">
                <label for="category" class="mb-1">Category</label>
                <select name="category_id" id="category" class="form-select mb-2">
                    @foreach ($categories as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
@endsection