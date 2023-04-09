@extends('public-theme.layout')
@section('page-head-part')
    <link href="{{ asset('/assets/pages/category/_style.css') }}" rel="stylesheet">
@endsection

@section('body')

    <div data-group="page_content" data-role="wrapper">
        <ol itemscope itemtype="https://schema.org/BreadcrumbList" data-group="breadcrumbs">
          <li itemprop="itemListElement" itemscope
              itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="{{route('homepage')}}" title="Перелік категорій">
              <span itemprop="name">Каталог</span></a>
            <meta itemprop="position" content="1" />
          </li>
          ›
          <li itemprop="itemListElement" itemscope
              itemtype="https://schema.org/ListItem">
            <span itemprop="name">{{$current_category->title}}</span>
            <meta itemprop="position" content="2" />
          </li>
        </ol>

        <hr data-group="breadcrumbs"></hr>

        <h1>Категорія: «{{$current_category->title}}»</h1>

        <div data-group="posts_list">
            @foreach($current_category->posts as $post)
                <div data-role="item" class="border_is_width flex">
                    <div class="basis_0 grow">
                        <a href="{{route('posts.show',$post->id)}}" data-role="title" title="Стаття «{{$post->title}}»">
                            {{$post->title}}
                        </a><br>
                        <p>{{$post->description}}</p>
                        
                    </div>
                    <div data-role="item_image" class="text_center">
                        <a href="{{route('posts.show',$post->id)}}" title="Стаття «{{$post->title}}»">
                            @if(!empty($post->image_path))
                                <img src="{{$post->image_path}}" alt="{{$post->image_alt}}" title="{{$post->image_title}}">
                            @else
                                <img alt="Піктограма теки з інформацією" title="Тека з інформацією" src="/assets/common/images/folder-information-outline.svg">
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection