@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Show Post
                  <a href="{!! route('post.index') !!}" class="pull-right">Back</a>
                </div>

                <div class="panel-body">
                  <table class="table table-stripped">
                    <tr>
                      <td>Title</td>
                      <td>:</td>
                      <td>{!! $post->title !!}</td>
                    </tr>
                    <tr>
                      <td>Content</td>
                      <td>:</td>
                      <td>
                        <div>
                          {!! $post->content !!}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Image</td>
                      <td>:</td>
                      <td>
                        <img src="{!! asset('uploads/post/' . $post->image) !!}" class="img-responsive">
                      </td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
