@extends('public-theme.layout')
@section('page-head-part')
    <link href="{{ asset('/assets/pages/homepage/_style.css') }}" rel="stylesheet">
@endsection

@section('body')

    <div data-group="page_content" data-role="wrapper">
        <h1>Категорії бази знань Ubuntu</h1>
        {{-- <h1 data-role="sitename" class="text_center">База знань Ubuntu</h1><h2 class="h2">{{$page->title}}</h2> --}}

        <div class="row custom_margin">
            @foreach($categories as $category)
                <div data-group="categories_list" data-role="item_wrapper" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <a href="{{route('categories.show',$category->id)}}" data-role="item" class="border_is_width flex column text_center" title="Перелік статей з категорії «{{$category->title}}»">
                        <div data-role="item_image" class="text_center flex_centered_item column">
                            @if(!empty($category->image_path))
                                <img src="{{$category->image_path}}">
                            @else
                                <img src="/assets/common/images/folder-information-outline.svg">
                            @endif
                        </div>
                        <div data-role="title" class="flex_centered_item">
                            <span>{{$category->title}}</span>
                        </div>
                        <div>

                            <span data-role="posts_counter">
                                @php
                                    $count = strval($category->posts()->count());
                                    $last_char = substr($count, -1);
                                    $number = intval($last_char);

                                    $text = 'статей';

                                    if ($number == 1) {
                                        $text = 'стаття';
                                    } else if($number >= 2 && $number <= 4) {
                                        $text = 'статті';
                                    }
                                @endphp
                                
                                ({{$count}} {{$text}})
                            </span>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection