@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Post
                  <a href="{!! route('post.create') !!}" class="pull-right">Create</a>
                </div>

                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-stripped">
                      <thead>
                        <tr>
                          <td>#</td>
                          <td>Title</td>
                          <td>Image</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($posts as $key => $post)
                        <tr>
                          <td>{!! $key + 1 !!}</td>
                          <td>{!! $post->title !!}</td>
                          <td>
                            <img src="{!! asset('uploads/post/' . $post->image) !!}" class="img-responsive" width="200">
                          </td>
                          <td>
                            {!! Form::open(['route' => ['post.destroy', $post->id], 'method' => 'DELETE']) !!}
                              <a href="{!! route('post.show', $post->id) !!}" class="btn btn-primary">Show</a>
                              <a href="{!! route('post.edit', $post->id) !!}" class="btn btn-warning">
                                Edit
                              </a>
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="panel-footer">
                  {!! $posts->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
