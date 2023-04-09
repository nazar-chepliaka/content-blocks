@extends('public-theme.layout')
@section('page-head-part')
    <link href="{{ asset('/assets/pages/post/_style.css') }}" rel="stylesheet">
@endsection

@section('body')
    <div data-group="page_content" data-role="wrapper">
        <ol itemscope itemtype="https://schema.org/BreadcrumbList" data-group="breadcrumbs">
          <li itemprop="itemListElement" itemscope
              itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="{{route('homepage')}}" title="Перелік категорій">
                <span itemprop="name">Каталог</span>
            </a>
            <meta itemprop="position" content="1" />
          </li>
          ›
          <li itemprop="itemListElement" itemscope
              itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage"
               itemprop="item" itemid="{{route('categories.show',$post->category->id)}}"
               href="{{route('categories.show',$post->category->id)}}" title="Перелік статей з категорії «{{$post->category->title}}»">
              <span itemprop="name">{{$post->category->title}}</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
          ›
          <li itemprop="itemListElement" itemscope
              itemtype="https://schema.org/ListItem">
            <span itemprop="name">{{$post->title}}</span>
            <meta itemprop="position" content="3" />
          </li>
        </ol>

        <hr data-group="breadcrumbs"></hr>

        <h1>{{$post->title}}</h1>

        <div data-role="post_content">
            @if(!empty($post->image_path))
                <img src="{{$post->image_path}}" alt="{{$post->image_alt}}" title="{{$post->image_title}}" data-role="main_image">
            @endif

            {!! $post->text !!}
        </div>
    </div>
@endsection