@extends('public-theme.layout')
@section('page-head-part')
    <link href="{{ asset('/assets/pages/post/_style.css') }}" rel="stylesheet">
@endsection

@section('body')
    <div data-group="page_content" data-role="wrapper">
        <h1>{{$post->title}}</h1>

        <div data-role="post_content">
            @if(!empty($post->image_path))
                <img src="{{$post->image_path}}" data-role="main_image">
            @endif

            {!! $post->text !!}
        </div>
    </div>
@endsection