<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
        <link rel="manifest" href="/favicons/site.webmanifest">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#1d232d">
        <link rel="shortcut icon" href="/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#1d232d">
        <meta name="msapplication-config" content="/favicons/browserconfig.xml">
        <meta name="theme-color" content="#1d232d">

        {!! SEOMeta::generate() !!}

        @php
            OpenGraph::setTitle(SEOMeta::getTitle()); // define title
            OpenGraph::setDescription(SEOMeta::getDescription());  // define description
            OpenGraph::setUrl(url()->full()); // define url
            OpenGraph::setSiteName(env('APP_NAME')); //define site_name
        @endphp

        {!! OpenGraph::generate() !!}
        {!! JsonLdMulti::generate() !!}
        
        @yield('meta')
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">

        <script src="{{ asset('/assets/common/js/manifest.js') }}"></script>
        <script src="{{ asset('/assets/common/js/app.js') }}"></script>

        @yield('page-head-part')
    </head>
    <body>
        @include('public-theme.templates.widgets.pages-header.index')

        <main class="content_wrapper">

            <div class="row">
                <div class="col-md-12">
                    @yield('breadcrumbs')
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div data-group="sidebar_content" data-role="wrapper">
                        <strong>Категорії бази знань:</strong>
                        <ul>
                            @foreach($categories as $category)
                                @php
                                    $active_class = '';
                                    
                                    if(!empty($current_category) && $current_category->id == $category->id) {
                                        $active_class = 'active';
                                    }
                                @endphp
                                <li class="{{$active_class}}">
                                    @if(!empty($current_category) && $current_category->id == $category->id)
                                        <span>{{$category->title}}</span>
                                    @else
                                        <a href="{{route('categories.show',$category->id)}}" title="Перелік статей з категорії «{{$category->title}}»">{{$category->title}}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    
                    @yield('body')

                </div>
            </div>
        </main>
       

    </body>
</html>