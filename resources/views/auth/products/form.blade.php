@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
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
                        @include('auth.layouts.error', ['fieldName' => 'category_id'])
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                            value="@isset($product){{ $product->code }}@endisset">
                        @include('auth.layouts.error', ['fieldName' => 'code'])
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name"
                            value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название en: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name_en'])
                        <input type="text" class="form-control" name="name_en" id="name_en"
                            value="@isset($product){{ $product->name_en }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description'])
								<textarea name="description" id="description" cols="72"
                                        rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание en: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description_en'])
								<textarea name="description_en" id="description_en" cols="72"
                                        rows="7">@isset($product){{ $product->description_en }}@endisset</textarea>
                    </div>
                </div>
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
                        @include('auth.layouts.error', ['fieldName' => 'price'])
                        <input type="text" class="form-control" name="price" id="price"
                            value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>
                <div class="input-group row">
                    <label for="count" class="col-sm-2 col-form-label">Количество: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'count'])
                        <input type="text" class="form-control" name="count" id="count"
                            value="@isset($product){{ $product->count }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="size" class="col-sm-2 col-form-label">Размер: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'size'])
                        <input type="text" class="form-control" name="size" id="size"
                            value="@isset($product){{ $product->size }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="is_spicy" class="col-sm-2 col-form-label">Острый: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'is_spicy'])
                        <input type="text" class="form-control" name="is_spicy" id="is_spicy"
                            value="@isset($product){{ $product->is_spicy }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="is_veg" class="col-sm-2 col-form-label">Овощной: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'is_veg'])
                        <input type="text" class="form-control" name="is_veg" id="is_veg"
                            value="@isset($product){{ $product->is_veg }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="is_best_offer" class="col-sm-2 col-form-label">Наиболее заказуемый: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'is_best_offer'])
                        <input type="text" class="form-control" name="is_best_offer" id="is_best_offer"
                            value="@isset($product){{ $product->is_best_offer }}@endisset">
                    </div>
                </div>
                <br>
                @foreach ([
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
                @endforeach
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
