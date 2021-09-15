<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Export Excel & CSV to Database Postgres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Export CSV & Excel to Database Example
        </h2>

        {{-- <form action="{{ route('products.export') }}" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Выберите файл</label>
                </div>
            </div>
            <button class="btn btn-primary">"Экспорт данных</button>
            {{-- <a class="btn btn-success" href="{{ route('products.export') }}">Экспорт данных</a> --}}
        </form>
    </div>
</body>

</html>
