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
                                                <button class="nav-link active" id="nav-name1-tab" data-bs-toggle="tab" data-bs-target="#nav-name1" type="button" role="tab" aria-controls="nav-name1" aria-selected="true">Название</button>
                                                <button class="nav-link" id="nav-name2-tab" data-bs-toggle="tab" data-bs-target="#nav-name2" type="button" role="tab" aria-controls="nav-name2" aria-selected="false">Название en</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-name1" role="tabpanel" aria-labelledby="nav-name1-tab">
                                                <div class="tab-content" id="namesTabContent">
                                                    <div class="tab-pane fade show active" id="name1" role="tabpanel" aria-labelledby="name1-tab">
                                                        @include('layouts.error', ['fieldName' => 'name1'])
                                                        <textarea name="name" id="name" cols="30" rows="1">{{ $category->name ?? '' }}</textarea>
                                                        {{-- {{ $category->name }} --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-name2" role="tabpanel" aria-labelledby="nav-name2-tab">
                                                <div class="tab-pane fade show active" id="name2" role="tabpanel" aria-labelledby="name2-tab">
                                                    @include('layouts.error', ['fieldName' => 'name_en'])
                                                    <textarea name="name_en" id="name_en" cols="30" rows="1">{{ $category->name_en ?? '' }}</textarea>
                                                    {{-- {{ $category->name_en }} --}}
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
                                                                <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                                                                <div class="col-sm-6">
                                                                    @error('description')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                        <textarea name="description" id="description" cols="50"
                                                                            rows="5">@isset($category){{ $category->description }}@endisset</textarea>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-description2" role="tabpanel" aria-labelledby="nav-description2-tab">
                                                <div class="tab-pane fade show active" id="description2" role="tabpanel" aria-labelledby="description2-tab">
                                                            <div class="input-group row">
                                                                <label for="description" class="col-sm-2 col-form-label">Описание en: </label>
                                                                <div class="col-sm-6">
                                                                    @error('description_en')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                        <textarea name="description_en" id="description_en" cols="50"
                                                                            rows="5">@isset($category){{ $category->description_en }}@endisset</textarea>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
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
