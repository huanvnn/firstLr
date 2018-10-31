@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{$message}}</strong>
                    </div>
                    @endif
                </div>
            <div class="row">
    
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong class="card-title">Post Table</strong>
                                </div>
                                <div class="col-md-6 text-right">
                                   <a href=" {{action('PostController@create')}}" class="btn btn-primary btn-sm">Add Post</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                        <th>Tag</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}} </td>
                                            <td> {{$post->content}} </td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->tag}}</td>
                                            <td>
                                            <form action="{{action('PostController@destroy', $post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ action('PostController@show', $post->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                <a href="{{ action('PostController@edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>   
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>        
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!-- .animated-->
    </div>
    <!-- .content -->
@endsection