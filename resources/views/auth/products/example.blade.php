@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')<table class="table">
        <thead><tr>
<div class="col-md-6 text-align-center">
    @isset($product)
        <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
    @else
        <h1>Добавить товар</h1>
    @endisset
            <th>Код</th>
            <th>Название</th>
            <th>Название en</th>
            <th>Описание</th>
            <th>Описание en</th>
            <th>Картинка</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Размер</th>
            <th>Острый</th>
            <th>Овощной</th>
            <th>Наиболее заказуемый</th>
            <tbody>
                <tr>
                <th scope="row"></th>
                <td>                <div class="input-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                            value="@isset($product){{ $product->code }}@endisset">
                        @include('auth.layouts.error', ['fieldName' => 'code'])
                    </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name"
                            value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name"
                            value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name_en'])
                        <input type="text" class="form-control" name="name_en" id="name_en"
                            value="@isset($product){{ $product->name_en }}@endisset">
                    </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description'])
								{{-- <textarea name="description" id="description" cols="72"
                                        rows="7">@isset($product){{ $product->description }}@endisset</textarea> --}}
                    </div>
                </div></td>
                <td>               </div>
                <div class="input-group row">
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description_en'])
								{{-- <textarea name="description_en" id="description_en" cols="72"
                                        rows="7">@isset($product){{ $product->description_en }}@endisset</textarea> --}}
                    </div>
                </div>                <div class="input-group row">
                    <div class="col-sm-2">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'price'])
                        <input type="text" class="form-control" name="price" id="price"
                            value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'count'])
                        <input type="text" class="form-control" name="count" id="count"
                            value="@isset($product){{ $product->count }}@endisset">
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'size'])
                        <input type="text" class="form-control" name="size" id="size"
                            value="@isset($product){{ $product->size }}@endisset">
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'is_spicy'])
                        <input type="text" class="form-control" name="is_spicy" id="is_spicy"
                            value="@isset($product){{ $product->is_spicy }}@endisset">
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'is_veg'])
                        <input type="text" class="form-control" name="is_veg" id="is_veg"
                            value="@isset($product){{ $product->is_veg }}@endisset">
                    </div>
                </div></td>
                <td>                <div class="input-group row">
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'is_best_offer'])
                        <input type="text" class="form-control" name="is_best_offer" id="is_best_offer"
                            value="@isset($product){{ $product->is_best_offer }}@endisset">
                    </div>
                </div></td>
                <td>                @foreach ([
                    'hit' => 'Хиты',
                    'new' => 'Новинки',
                    'recommend' => 'Рекомендуемые',
                    ] as $field => $title)
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">{{  $title }}: </label>
                        <div class="col-sm-6">
                            <input type="checkbox" class="form-control" name="{{ $field }}" id="{{ $field }}"
                                @if(isset($product) && $product->$field === 1)
                                checked="checked"
                                @endif
                            >
                        </div>
                    </div>
                    <br>
                    @endforeach</td>
                </tr>
        <form method="POST" enctype="multipart/form-data"
            @isset($product)
            action="{{ route('products.update', $product) }}"
            @else
            action="{{ route('products.store') }}"
            @endisset
        >

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
                        @include('auth.layouts.error', ['fieldName' => 'category_id'])
                    </div><div><button class="btn btn-success">Сохранить</button><br>
                </div>

            </div>

        </form>
    </div>
@endsection

