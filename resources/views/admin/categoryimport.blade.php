@extends('layouts.admin')

@section('title', 'Импорт')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                    <h2>Импорт</h2>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" enctype "multipart/form-data" action="{{ route('categories.import') }}"> --}}
                                @csrf
                                <div class="form-group">
                                <label for="file">Выберите CSV</label>
                                <input type="file" name="file" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-primary">Импорт</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
