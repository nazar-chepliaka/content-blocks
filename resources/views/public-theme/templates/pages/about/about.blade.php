@extends('public-theme.layout')
@section('page-head-part')
    <link href="{{ asset('/assets/pages/about/_style.css') }}" rel="stylesheet">
@endsection

@section('body')

    <div data-group="page_content" data-role="wrapper">
        <h1>Про базу знань Ubuntu</h1>
        {{-- <h1 data-role="sitename" class="text_center">База знань Ubuntu</h1><h2 class="h2">{{$page->title}}</h2> --}}

        <div class="row">
            Мета проекту - поділитись працюючими порадами, посібниками і поясненнями.
        </div>
    </div>

@endsection