@extends('layouts.app')

@section('style')
  <link rel="stylesheet" type="text/css" href="{!! asset('css/blog.css') !!}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @forelse ($posts as $post)
          <div class="blog-post">
            <h2 class="blog-post-title">{!! $post->title !!}</h2>
            <p class="blog-post-meta">{!! $post->created_at->format('M d, Y') !!}</p>
            <img src="{!! asset('uploads/post/' . $post->image) !!}" class="img-responsive">
            <div class="col-lg-12">&nbsp;</div>
            <div>
              {!! $post->content !!}
            </div>
          </div><!-- /.blog-post -->
        @empty
          <div class="blog-post">
            <h3 class="blog-post-title">Empty Post</h3>
          </div><!-- /.blog-post -->
        @endforelse
        {!! $posts->render() !!}
        </div>
    </div>
</div>
@endsection
