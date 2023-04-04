@extends('admin-theme.layout')

@section('content')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header stincky">
                    <div class="d-flex justify-content-between">
                        <div>
                            Створення категорії
                        </div>
                        <div class="d-flex">
                            <a href="{{route('admin.categories.index')}}" class="btn btn-block btn-outline-dark" title="Повернутись до списку категорій">
                                <i class="fas fa-undo"></i>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data" id="category">
                        {!! csrf_field() !!}

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Зображення категорії</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile02" value="{{ old('image') }}">
                            <label class="custom-file-label" for="inputGroupFile02">Оберіть файл</label>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Назва</span>
                          </div>
                          <input type="text" class="form-control translit"  name="title" value="{{ old('title') }}">
                        </div>

                        
                        <div class="card card-secondary">
                            <div class="card-header"> <h3 class="card-title">Seo</h3></div>

                            <div class="card-body">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Seo Заголовок</span>
                                    </div>
                                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                                </div>

                                <div class="form-group">
                                    <label>Seo Опис</label>
                                    <textarea class="form-control" name="seo_description" id="editor2" >{{ old('seo_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Seo ключові слова</label>
                                    <textarea class="form-control" name="seo_keywords" id="editor3" >{{ old('seo_keywords') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Створити</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection