	@extends('layouts.admin')

	@isset($category)
		@section('title', 'Редактировать категорию ' . $category->name)
	@else
		@section('title', 'Создать категорию')
	@endisset

	@section('content')
		<div class="col-md-12">
			@isset($category)
					<h2>Редактировать Категорию <br><b>{{ $category->name }}</b></h2>
						@else
							<h2>Добавить Категорию</h2>
						@endisset
						<form method="POST" enctype="multipart/form-data"
							@isset($category)
							action="{{ route('admin.categories.update', $category) }}"
							@else
							action="{{ route('admin.categories.store') }}"
						@endisset
						>
							<div>
									@isset($category)
										@method('PUT')
									@endisset
									@csrf
									<div class="input-group row">
										<label for="code" class="col-sm-2 col-form-label">Код: </label>
										<div class="col-sm-6">
											@error('code')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input type="text" class="form-control" name="code" id="code"
											value="{{ old('code', isset($category) ? $category->code : null) }}">
										</div>
									</div>
									<br>
                                        <ul>
                                            <li class="nav nav-tabs" id="nav-tab-name" role="tablist">
                                                <button class="nav-link active" id="nav-name1-tab" data-bs-toggle="tab" data-bs-target="#nav-name1" type="button" role="tab" aria-controls="nav-name1" aria-selected="true">Home</button>
                                                <button class="nav-link" id="nav-name2-tab" data-bs-toggle="tab" data-bs-target="#nav-name2" type="button" role="tab" aria-controls="nav-name1" aria-selected="false">Profile</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-name1" role="tabpanel" aria-labelledby="nav-name1-tab">
                                                home
                                            </div>
                                            <div class="tab-pane fade" id="nav-name2" role="tabpanel" aria-labelledby="nav-name2-tab">
                                                profile
                                            </div>
                                        </div>

                                    <ul class="nav nav-tabs" id="namesTab" role="tablist">
                                        <li class="nav-ite1" role="presentation">
                                            <button class="nav-link active" id="name1-tab" data-bs-toggle="tab" data-bs-target="#name1" type="button" role="tab" aria-controls="name1" aria-selected="true">Название:</button>
                                    <div class="tab-content" id="namesTabContent">
                                        <div class="tab-pane fade show active" id="name1" role="tabpanel" aria-labelledby="name1-tab">
                                            @include('layouts.error', ['fieldName' => 'name1'])
                                            <textarea name="name" id="name" cols="50" rows="1">{{ $category->name ?? '' }}</textarea>
                                            {{-- {{ $category->name }} --}}
                                        </div>
                                    </div>
                                    </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="name2-tab" data-bs-toggle="tab" data-bs-target="#name2" type="button" role="tab" aria-controls="name2" aria-selected="false">Название en:</button>
                                            <div class="tab-content" id="namesTabContent">
                                        <div class="tab-pane fade show active" id="name2" role="tabpanel" aria-labelledby="name2-tab">
                                            @include('layouts.error', ['fieldName' => 'name2'])
                                            <textarea name="name_en" id="name_en" cols="50" rows="1">{{ $category->name_en ?? '' }}</textarea>
                                            {{-- {{ $category->name_en }} --}}
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
                                            {{-- @include('layouts.error', ['fieldName' => 'description'])
                                                    <textarea name="description" id="description" cols="72"
                                                            rows="7">@isset($category){{ $category->description }}@endisset</textarea> --}}
                                        </div>
                                    </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="desc2-tab" data-bs-toggle="tab" data-bs-target="#desc2" type="button" role="tab" aria-controls="#desc2" aria-selected="false">Описание en:</button>
                                                        <div class="tab-content" id="namesTab">
                                        <div class="tab-pane fade show active" id="desc2" role="tabpanel" aria-labelledby="desc2-tab">
                                            @include('layouts.error', ['fieldName' => 'desc2'])
                                            <textarea name="description_en" id="description_en" cols="50" rows="7">{{ $category->description_en ?? '' }}</textarea>
                                            {{-- @include('layouts.error', ['fieldName' => 'description_en'])
                                                    <textarea name="description_en" id="description_en" cols="72"
                                                            rows="7">@isset($category){{ $category->description_en }}@endisset</textarea> --}}
                                        </div>
                                    </div>
                                        </li>
                                </ul>
                                            {{-- @include('layouts.error', ['fieldName' => 'description_en'])
                                                    <textarea name="description_en" id="description_en" cols="72"
                                                            rows="7">@isset($product){{ $product->description_en }}@endisset</textarea> --}}
                                        </div>
                                    </div>
									{{-- <div class="input-group row">
										<label for="description" class="col-sm-2 col-form-label">Описание: </label>
										<div class="col-sm-6">
											@error('description')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
								<textarea name="description" id="description" cols="72"
													rows="7">@isset($category){{ $category->description }}@endisset</textarea>
										</div>
									</div>
									<br>
									<div class="input-group row">
										<label for="description" class="col-sm-2 col-form-label">Описание en: </label>
										<div class="col-sm-6">
											@error('description_en')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
								<textarea name="description_en" id="description_en" cols="72"
													rows="7">@isset($category){{ $category->description_en }}@endisset</textarea>
										</div>
									</div> --}}									{{-- <div class="input-group row">
										<label for="name" class="col-sm-2 col-form-label">Название: </label>
										<div class="col-sm-6">
											@error('name')
											<div class="alert alert-danger">{{  $message }}</div>
											@enderror
											<input type="text" class="form-control" name="name" id="name"
													value="@isset($category){{ $category->name }}@endisset">
										</div>
									</div>
									<br>
									<div class="input-group row">
										<label for="name" class="col-sm-2 col-form-label">Название en: </label>
										<div class="col-sm-6">
											@error('name_en')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input type="text" class="form-control" name="name_en" id="name_en"
													value="@isset($category){{ $category->name_en }}@endisset">
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
                                        <label for="count" class="col-sm-2 col-form-label">Количество: </label>
                                        <div class="col-sm-2">
                                            @include('layouts.error', ['fieldName' => 'count'])
                                            <input type="text" class="form-control" name="count" id="count"
                                                value="@isset($category){{ $category->count }}@endisset">
                                        </div>
                                    </div>
									<button class="btn btn-success btn-sm">Сохранить</button>
							</div>
						</form>
		</div>
	@endsection
