@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Редактировать категорию ' . $category->name)
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')
@isset($category)
        <h1>Редактировать Категорию <b>{{ $category->name }}</b></h1>
@else
        <h1>Добавить Категорию</h1>
@endisset
    <ul class="nav nav-tabs col-md-12" id="nav-myTab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="nav-code-tab" data-bs-toggle="tab" data-bs-target="#code" type="button" role="tab" aria-controls="nav-code" aria-selected="true">Код</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="name-tab" data-bs-toggle="tab" data-bs-target="#name" type="button" role="tab" aria-controls="name" aria-selected="false">Название</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="name_en-tab" data-bs-toggle="tab" data-bs-target="#name_en" type="button" role="tab" aria-controls="name_en" aria-selected="false">Название en</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Описание</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="description_en-tab" data-bs-toggle="tab" data-bs-target="#description_en" type="button" role="tab" aria-controls="description_en" aria-selected="false">Описание en</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Картинка</button>
        </li>
    </ul>
<div class="tab-content  col-md-12" id="nav-myTabContent">
    <div class="tab-pane fade show active" id="nav-code" role="tabpanel" aria-labelledby="nav-code-tab">
                                            <div class="input-group row">
                                    <label for="code" class="col-sm-1 col-form-label">Код: </label>
                                    <div class="col-sm-6">
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control" name="code" id="code"
                                        value="{{ old('code', isset($category) ? $category->code : null) }}">
                                    </div>
                                </div>
                            </div>
    <div class="tab-pane fade" id="name" role="tabpanel" aria-labelledby="name-tab">
                                <div class="input-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                                    <div class="col-sm-6">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control" name="name" id="name"
                                                value="@isset($category){{ $category->name }}@endisset">
                                    </div>
                                </div>
                            </div>
    <div class="tab-pane fade" id="name_en" role="tabpanel" aria-labelledby="name_en-tab">
                                <div class="input-group row">
                                    <label for="name_en" class="col-sm-2 col-form-label">Название en: </label>
                                    <div class="col-sm-6">
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control" name="name_en" id="name_en"
                                                value="@isset($category){{ $category->name_en }}@endisset">
                                    </div>
                                </div>
                            </div>
    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="input-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                                    <div class="col-sm-6">
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            <textarea name="description" id="description" cols="50"
                                                rows="7">@isset($category){{ $category->description }}@endisset</textarea>
                                    </div>
                                </div>
                            </div>
    <div class="tab-pane fade" id="description_en" role="tabpanel" aria-labelledby="description_en-tab">
                                    <div class="input-group row">
                                    <label for="description_en" class="col-sm-2 col-form-label">Описание en: </label>
                                    <div class="col-sm-6">
                                        @error('description_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            <textarea name="description_en" id="description_en" cols="50"
                                                rows="7">@isset($category){{ $category->description_en }}@endisset</textarea>
                                            </div>
                                        </div>
                                    </div>
    <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                                            <div class="input-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                                    <div class="col-sm-10">
                                        <label class="btn btn-default btn-file col-sm-2">
                                                Загрузить <input type="file" style="display: none;" name="image" id="image">
                                        </label>
                                    </div>
                                </div>
                            </div>
                    <form method="POST" enctype="multipart/form-data"
                        @isset($category)
                        action="{{ route('categories.update', $category) }}"
                        @else
                        action="{{ route('categories.store') }}"
                    @endisset>
                        <div>
                                @isset($category)
                                    @method('PUT')
                                @endisset
                                @csrf
                                <button class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
    </div>
@endsection
