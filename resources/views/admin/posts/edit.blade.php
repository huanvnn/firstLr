@extends('layouts.admin')

@section('content')
    <div class="row">
        @if ($message=Session::get('success'))
            
            <div class="col-md-6 offset-3 text-center">
                <div class="alert alert-success">
                    {{$message}}
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
         
                <form action="{{ action('PostController@update',$posts->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $posts->title }}">
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag" value="{{ $posts->tag }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="3" name="content" > {{ $posts->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-warning">
                    </div>
                </form>  
        </div>
    </div>
@endsection