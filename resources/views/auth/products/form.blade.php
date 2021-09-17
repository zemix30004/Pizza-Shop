@extends('layouts.new-master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h2>Редактировать товар <b>{{ $product->name }}</b></h2>
        @else
            <h2>Добавить товар</h2>
        @endisset
        <form method="POST" enctype="multipart/form-data"
            @isset($product)
            action="{{ route('products.update', $product) }}"
            @else
            action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                @isset($product)
                                @if ($product->category_id == $category->id)
                                selected
                                @endif
                                @endisset
                                    >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @include('layouts.error', ['fieldName' => 'category_id'])
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                            value="@isset($product){{ $product->code }}@endisset">
                        @include('layouts.error', ['fieldName' => 'code'])
                    </div>
                </div>
                <br>
                <ul class="nav nav-tabs" id="namesTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="name1-tab" data-bs-toggle="tab" data-bs-target="#name1" type="button" role="tab" aria-controls="home" aria-selected="true">Название:</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" active id="name2-tab" data-bs-toggle="tab" data-bs-target="#name2" type="button" role="tab" aria-controls="profile" aria-selected="false">Название en:</button>
                    </li>
                </ul>
                <div class="tab-content" id="namesTabContent">
                    <div class="tab-pane fade show active" id="name1" role="tabpanel" aria-labelledby="name1-tab">
                        @include('layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="tab-pane fade" id="name2" role="tabpanel" aria-labelledby="name2-tab">
                        @include('layouts.error', ['fieldName' => 'name_en'])
                        <input type="text" class="form-control" name="name_en" id="name_en" value="{{ old('name_en') }}">
                    </div>
                </div>
                <ul class="nav nav-tabs" id="descsTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc1-tab" data-bs-toggle="tab" data-bs-target="#desc1" type="button" role="tab" aria-controls="#desc1" aria-selected="true">Описание:</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="desc2-tab" data-bs-toggle="tab" data-bs-target="#desc2" type="button" role="tab" aria-controls="#desc2" aria-selected="false">Описание en:</button>
                    </li>
                </ul>
                <div class="tab-content" id="descsTabContent">
                    <div class="tab-pane fade show active" id="desc1" role="tabpanel" aria-labelledby="desc1-tab">
                        @include('layouts.error', ['fieldName' => 'name'])
                        <textarea name="description" id="description" cols="50" rows="7">{{ $product->description ?? '' }}</textarea>
                        @include('layouts.error', ['fieldName' => 'description'])
								<textarea name="description" id="description" cols="72"
                                        rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                    </div>
                </div>
                {{-- <div class="tab-content" id="namesTab">
                    <div class="tab-pane fade show active" id="desc2" role="tabpanel" aria-labelledby="desc2-tab">
                        @include('layouts.error', ['fieldName' => 'name_en'])
                        <textarea name="description" id="description" cols="50" rows="7">{{ $product->description_en ?? '' }}</textarea>
                        @include('layouts.error', ['fieldName' => 'description_en'])
								<textarea name="description_en" id="description_en" cols="72"
                                        rows="7">@isset($product){{ $product->description_en }}@endisset</textarea>
                    </div>
                </div> --}}
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-2">
                        @include('layouts.error', ['fieldName' => 'price'])
                        <input type="text" class="form-control" name="price" id="price"
                            value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="count" class="col-sm-2 col-form-label">Количество: </label>
                    <div class="col-sm-2">
                        @include('layouts.error', ['fieldName' => 'count'])
                        <input type="text" class="form-control" name="count" id="count"
                            value="@isset($product){{ $product->count }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="size" class="col-sm-2 col-form-label">Размер: </label>
                    <div class="col-sm-2">
                        @include('layouts.error', ['fieldName' => 'size'])
                        <input type="text" class="form-control" name="size" id="size"
                            value="@isset($product){{ $product->size }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="is_spicy" class="col-sm-2 col-form-label">Острый: </label>
                    <div class="col-sm-2">
                        @include('layouts.error', ['fieldName' => 'is_spicy'])
                        <input type="text" class="form-control" name="is_spicy" id="is_spicy"
                            value="@isset($product){{ $product->is_spicy }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="is_veg" class="col-sm-2 col-form-label">Овощной: </label>
                    <div class="col-sm-2">
                        @include('layouts.error', ['fieldName' => 'is_veg'])
                        <input type="text" class="form-control" name="is_veg" id="is_veg"
                            value="@isset($product){{ $product->is_veg }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="is_best_offer" class="col-sm-2 col-form-label">Наиболее заказуемый: </label>
                    <div class="col-sm-2">
                        @include('layouts.error', ['fieldName' => 'is_best_offer'])
                        <input type="text" class="form-control" name="is_best_offer" id="is_best_offer"
                            value="@isset($product){{ $product->is_best_offer }}@endisset">
                    </div>
                </div>
                <br>
                <ul class="nav col-6">
                @foreach ([
                'hit' => 'Хиты',
                'new' => 'Новинки',
                'recommend' => 'Рекомендуемые',
                ] as $field => $title)
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">{{ $title }}: </label>
                    <div class="col-sm-6">
                        <input type="checkbox" class="form-control" name="{{ $field }}" id="{{ $field }}"
                            @if(isset($product) && $product->$field === 1)
                            checked="checked"
                            @endif
                        >
                    </div>
                </div>
                @endforeach
            </ul>
                <button class="btn btn-success btn-sm">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
