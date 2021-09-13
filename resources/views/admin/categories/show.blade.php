@extends('layouts.admin')

@section('title', 'Категория ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $category->name }}</h1>
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
            <tr class="nav nav-tabs" id="namesTab" role="tablist">
                <td class="nav-item" role="presentation">
                    <button class="nav-link active" id="name1-tab" data-bs-toggle="tab" data-bs-target="#name1" type="button" role="tab" aria-controls="name1" aria-selected="true">Название:</button>
                </td>
                <td class="nav-item" role="presentation">
                    <button class="nav-link" id="name2-tab" data-bs-toggle="tab" data-bs-target="#name2" type="button" role="tab" aria-controls="name2" aria-selected="false">Название en:</button>
            </td>
            </tr>
            <div class="tab-content" id="namesTabContent">
                <div class="tab-pane fade show active" id="name1" role="tabpanel" aria-labelledby="name1-tab">
                    {{ $category->name }}
                </div>
                <div class="tab-pane fade" id="name2" role="tabpanel" aria-labelledby="name2-tab">
                    {{ $category->name_en }}
                </div>
            </div>
            {{-- <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{ $category->name_en }}</td>
            </tr> --}}
            <tr class="nav nav-tabs" id="descsTab" role="tablist">
                <div class="nav-item" role="presentation">
                    <button class="nav-link active" id="desc1-tab" data-bs-toggle="tab" data-bs-target="#desc1" type="button" role="tab" aria-controls="#desc1" aria-selected="true">Описание:</button>
                </div>
                <div class="nav-item" role="presentation">
                    <button class="nav-link" id="desc2-tab" data-bs-toggle="tab" data-bs-target="#desc2" type="button" role="tab" aria-controls="#desc2" aria-selected="false">Описание en:</button>
                </div>
            </tr>
            <div class="tab-content" id="descsTabContent">
                <div class="tab-pane fade show active" id="desc1" role="tabpanel" aria-labelledby="desc1-tab">
                    @include('layouts.error', ['fieldName' => 'desc1'])
                    <textarea name="description" id="description" cols="50" rows="7">{{ $product->description ?? '' }}</textarea>
                    @include('layouts.error', ['fieldName' => 'description'])
                            <textarea name="description" id="description" cols="72"
                                    rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                </div>
            </div>
            <div class="tab-content" id="namesTab">
                <div class="tab-pane fade show active" id="desc2" role="tabpanel" aria-labelledby="desc2-tab">
                    @include('layouts.error', ['fieldName' => 'desc2'])
                    <textarea name="description" id="description" cols="50" rows="7">{{ $product->description_en ?? '' }}</textarea>
                    @include('layouts.error', ['fieldName' => 'description_en'])
                            <textarea name="description_en" id="description_en" cols="72"
                                    rows="7">@isset($product){{ $product->description_en }}@endisset</textarea>
                </div>
            </div>
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
                <td>Кол-во товаров</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
