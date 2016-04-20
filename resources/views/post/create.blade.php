@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Create New Post
                  <a href="{!! route('post.index') !!}" class="pull-right">Back</a>
                </div>

                <div class="panel-body">
                {!! Form::open(['route' => 'post.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                  <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                    {!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                      @if ($errors->has('title'))
                        <span class="help-block">
                          <strong>{!! $errors->first('title') !!}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                    {!! Form::label('content', 'Content', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
                      @if ($errors->has('content'))
                        <span class="help-block">
                          <strong>{!! $errors->first('content') !!}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                    {!! Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::file('image', ['class' => 'form-control']) !!}
                      @if ($errors->has('image'))
                        <span class="help-block">
                          <strong>{!! $errors->first('image') !!}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>
                  </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
  <script type="text/javascript" src="{!! asset('plugins/tinymce/tinymce.min.js') !!}"></script>
  <script type="text/javascript">
    tinymce.init({ selector : "textarea" });
  </script>
@endsection
