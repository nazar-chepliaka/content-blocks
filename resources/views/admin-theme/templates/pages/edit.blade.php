@extends('admin-theme.layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('content')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header stincky">
                    <div class="d-flex justify-content-between">
                        <div >
                            {{ $page->title }}
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary" form="catalog">Оновити</button>
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <form action="{{route('admin.pages.update', $page->id)}}" method="POST" enctype="multipart/form-data" id="catalog">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Назва</span>
                            </div>
                            <input type="text" class="form-control" name="title" value="@isset($page->title){{$page->title}}@endisset">
                        </div>

                        <div class="card card-secondary">
                            <div class="card-header"> <h3 class="card-title">Seo</h3></div>

                            <div class="card-body">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Seo Заголовок</span>
                                    </div>
                                    <input type="text" class="form-control" name="seo_title" value="@isset($page->seo_title){{$page->seo_title}}@endisset">
                                </div>

                                <div class="form-group">
                                    <label>Seo Опис</label>
                                    <textarea  class="form-control" name="seo_description" id="editor2" >@isset($page->seo_description){{$page->seo_description}}@endisset</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Seo ключові слова</label>
                                    <textarea class="form-control" name="seo_keywords" id="editor3" >@isset($page->seo_keywords){{$page->seo_keywords}}@endisset</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary mt-4">Оновити</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection