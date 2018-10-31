@extends('layouts.admin')
@section('content')
    <div class="row">
        @if ($message=Session::get('danger'))
            <div class="alert alert-danger">
            <strong>{{$message}}</strong>
            </div>
        @endif
    </div>
    
    <div>
        <div class="card">
            <div class="card-header"><strong>Create Post</strong><small> Form</small></div>
            <div class="card-body card-block">
            <form action="{{ action('PostController@store') }}" method="POST">
                @csrf
                    <div class="form-group"><label for="title" class=" form-control-label">Title</label><input type="text" id="title" name="title" placeholder="Enter Title"
                            class="form-control"></div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group"><label for="tag" class=" form-control-label">Tag</label><input type="text" id="tag" name="tag" placeholder="PHP , JAVA..."
                                    class="form-control"></div>
                        </div>
                        {{-- <div class="col-8">
                            <div class="form-group"><label for="user_id" class=" form-control-label">AAA</label><input type="text" id="user_id" name="user_id" placeholder="PHP , JAVA..."
                                    class="form-control"></div>
                        </div> --}}
                    </div>
                    <div class="form-group"><label for="content" class=" form-control-label">Country</label><textarea type="text" id="content" name="content"
                            class="form-control"></textarea></div>
                    <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Create</button></div>
                </form>
            </div>
        </div>
    </div>
    
@endsection