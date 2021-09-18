@extends('layouts.admin')

@section('title', 'Продукт ' . $product->name)

@section('content')
    <div class="col-md-12">
        <h2>{{ $product->name }}</h2>
        <ul class="nav nav-tabs" id="namesTab" role="tablist">
            <li class="nav-ite1" role="presentation">
                <button class="nav-link active" id="name1-tab" data-bs-toggle="tab" data-bs-target="#name1" type="button" role="tab" aria-controls="name1" aria-selected="true">Название:</button>
        <div class="tab-content" id="namesTabContent">
            <div class="tab-pane fade show active" id="name1" role="tabpanel" aria-labelledby="name1-tab">
                @include('layouts.error', ['fieldName' => 'name1'])
                <textarea name="name" id="name" cols="50" rows="1">{{ $product->name ?? '' }}</textarea>
                {{-- {{ $product->name }} --}}
            </div>
        </div>
        </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="name2-tab" data-bs-toggle="tab" data-bs-target="#name2" type="button" role="tab" aria-controls="name2" aria-selected="false">Название en:</button>
                <div class="tab-content" id="namesTabContent">
            <div class="tab-pane fade show active" id="name2" role="tabpanel" aria-labelledby="name2-tab">
                @include('layouts.error', ['fieldName' => 'name2'])
                <textarea name="name_en" id="name_en" cols="50" rows="1">{{ $product->name_en ?? '' }}</textarea>
                {{-- {{ $product->name_en }} --}}
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
                    <textarea name="description" id="description" cols="50" rows="7">{{ $product->description ?? '' }}</textarea>
                    {{-- @include('layouts.error', ['fieldName' => 'description'])
                            <textarea name="description" id="description" cols="72"
                                    rows="7">@isset($product){{ $product->description }}@endisset</textarea> --}}
                </div>
            </div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="desc2-tab" data-bs-toggle="tab" data-bs-target="#desc2" type="button" role="tab" aria-controls="#desc2" aria-selected="false">Описание en:</button>
                                <div class="tab-content" id="namesTab">
                <div class="tab-pane fade show active" id="desc2" role="tabpanel" aria-labelledby="desc2-tab">
                    @include('layouts.error', ['fieldName' => 'desc2'])
                    <textarea name="description_en" id="description_en" cols="50" rows="7">{{ $product->description_en ?? '' }}</textarea>
                    {{-- @include('layouts.error', ['fieldName' => 'description_en'])
                            <textarea name="description_en" id="description_en" cols="72"
                                    rows="7">@isset($product){{ $product->description_en }}@endisset</textarea> --}}
                </div>
            </div>
                </li>
            </ul>
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
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product->code }}</td>
            </tr>
{{--
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{ $product->name_en }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Описание en</td>
                <td>{{ $product->description_en }}</td>
            </tr> --}}
            <tr>
                <td>Картинка</td>
{{--                <td><img src="{{ Storage::url($product->image) }}" height="240px"></td>--}}
                <td><img src="{{ asset('storage/' . $product->image) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Лэйблы</td>
                <td>
                @if($product->isNew())
                    <span class="badge badge-success">Новинка</span>
                @endif

                @if($product->isRecommend())
                <span class="badge badge-warning">Рекомендуем</span>
                @endif

                @if($product->isHit())
                <span class="badge badge-danger">Хит продаж</span>
                @endif
            </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
