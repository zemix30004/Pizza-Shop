@extends('layouts.admin')

@section('title', 'Категория ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h2>{{ $category->name}}</h2>
        <ul>
            <li class="nav nav-tabs" id="nav-tab-name" role="tablist">
                <button class="nav-link active" id="nav-name1-tab" data-bs-toggle="tab" data-bs-target="#nav-name1" type="button" role="tab" aria-controls="nav-name1" aria-selected="true">Название</button>
                <button class="nav-link" id="nav-name2-tab" data-bs-toggle="tab" data-bs-target="#nav-name2" type="button" role="tab" aria-controls="nav-name2" aria-selected="false">Название en</button>
            </li>
        </ul>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-name1" role="tabpanel" aria-labelledby="nav-name1-tab">
                <div class="tab-content" id="namesTabContent">
                    <div class="tab-pane fade show active" id="name1" role="tabpanel" aria-labelledby="name1-tab">
                        {{-- @include('layouts.error', ['fieldName' => 'name1'])
                        <textarea name="name" id="name" cols="30" rows="1">{{ $category->name ?? '' }}</textarea> --}}
                        {{ $category->name }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-name2" role="tabpanel" aria-labelledby="nav-name2-tab">
                <div class="tab-pane fade show active" id="name2" role="tabpanel" aria-labelledby="name2-tab">
                    {{-- @include('layouts.error', ['fieldName' => 'name2'])
                    <textarea name="name_en" id="name_en" cols="30" rows="1">{{ $category->name_en ?? '' }}</textarea> --}}
                    {{ $category->name_en }}
                </div>
            </div>
            </div>
        </div>
        <br>
        <ul>
            <li class="nav nav-tabs" id="nav-tab-description" role="tablist">
                <button class="nav-link active" id="nav-description1-tab" data-bs-toggle="tab" data-bs-target="#nav-description1" type="button" role="tab" aria-controls="nav-description1" aria-selected="true">Описание</button>
                <button class="nav-link" id="nav-description2-tab" data-bs-toggle="tab" data-bs-target="#nav-description2" type="button" role="tab" aria-controls="nav-description2" aria-selected="false">Описание en</button>
            </li>
        </ul>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-description1" role="tabpanel" aria-labelledby="nav-description-tab">
                <div class="tab-content" id="descriptionTabContent">
                    <div class="tab-pane fade show active" id="description1" role="tabpanel" aria-labelledby="description1-tab">
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-6">
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                        {{-- <textarea name="description" id="description" cols="50"
                                            rows="5"></textarea> --}}
                                            @isset($category){{ $category->description }}@endisset
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-description2" role="tabpanel" aria-labelledby="nav-description2-tab">
                <div class="tab-pane fade show active" id="description2" role="tabpanel" aria-labelledby="description2-tab">
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-6">
                                    @error('description_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                        {{-- <textarea name="description_en" id="description_en" cols="50"
                                            rows="5"></textarea> --}}
                                            @isset($category){{ $category->description_en }}@endisset
                                </div>
                            </div>
                </div>
            </div>
            </div>
        </div>
    <br>
{{--
                    <ul class="nav nav-tabs" id="namesTab" role="tablist">
                <li class="nav-ite1" role="presentation">
                    <button class="nav-link active" id="name1-tab" data-bs-toggle="tab" data-bs-target="#name1" type="button" role="tab" aria-controls="name1" aria-selected="true">Название:</button>
            <div class="tab-content" id="namesTabContent">
                <div class="tab-pane fade show active" id="name1" role="tabpanel" aria-labelledby="name1-tab">
                    @include('layouts.error', ['fieldName' => 'name1'])
                    <textarea name="name" id="name" cols="50" rows="1">{{ $category->name ?? '' }}</textarea>
                    {{ $category->name }}
                </div>
            </div>
            </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="name2-tab" data-bs-toggle="tab" data-bs-target="#name2" type="button" role="tab" aria-controls="name2" aria-selected="false">Название en:</button>
                    <div class="tab-content" id="namesTabContent">
                <div class="tab-pane fade show active" id="name2" role="tabpanel" aria-labelledby="name2-tab">
                    @include('layouts.error', ['fieldName' => 'name2'])
                    <textarea name="name_en" id="name_en" cols="50" rows="1">{{ $category->name_en ?? '' }}</textarea>
                    {{ $category->name_en }}
                </div>
            </div>
            </li>
        </ul>
            <ul class="nav nav-tabs" id="descsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="desc1-tab" data-bs-toggle="tab" data-bs-target="#desc1" type="button" role="tab" aria-controls="#desc1" aria-selected="true">Описание:</button>
                                <div class="tab-content" id="descsTabContent">
                <div class="tab-pane fade show active" id="desc1" role="tabpanel" aria-labelledby="desc1-tab">
                    @include('layouts.error', ['fieldName' => 'desc1'])
                    <textarea name="description" id="description" cols="50" rows="7">{{ $category->description ?? '' }}</textarea>
                    @include('layouts.error', ['fieldName' => 'description'])
                            <textarea name="description" id="description" cols="72"
                                    rows="7">@isset($category){{ $category->description }}@endisset</textarea>
                </div>
            </div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="desc2-tab" data-bs-toggle="tab" data-bs-target="#desc2" type="button" role="tab" aria-controls="#desc2" aria-selected="false">Описание en:</button>
                                <div class="tab-content" id="namesTab">
                <div class="tab-pane fade show active" id="desc2" role="tabpanel" aria-labelledby="desc2-tab">
                    @include('layouts.error', ['fieldName' => 'desc2'])
                    <textarea name="description_en" id="description_en" cols="50" rows="7">{{ $category->description_en ?? '' }}</textarea>
                    @include('layouts.error', ['fieldName' => 'description_en'])
                            <textarea name="description_en" id="description_en" cols="72"
                                    rows="7">@isset($category){{ $category->description_en }}@endisset</textarea>
                </div>
            </div>
                </li>
        </ul> --}}
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            {{-- <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{ $category->name_en }}</td>
            </tr> --}}
            {{-- <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Описание en</td>
                <td>{{ $category->description_en }}</td>
            </tr> --}}
            <tr>
                <td>Картинка</td>
                <td><img src="{{ asset('storage/' . $category->image) }}"
                        height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во продуктов</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
