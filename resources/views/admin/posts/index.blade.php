@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="animated fadeIn">
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