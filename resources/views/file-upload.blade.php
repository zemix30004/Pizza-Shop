<?php
if(isset($_FILES['file'])){
    $errors = array("file");
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strlower(end(explode('.',$_FILES['file']['name'] )));

    $expensions = array("file");
    // if($file_size> 2097152) {
    //     $errors[] = 'Файл должен быть 2 мб';
    // }
if (empty($errors) == true) {
    move_uploaded_file($file_tmp,"uploads/".$file_name);
    echo "Success";
}else{
    print $errors;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Laravel File Upload</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
    <h3 class="text-center mb-5">Upload and Import CSVFile in Laravel</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group">
                <input type="file" name="file" class="form-control" id="chooseFile" accept=".csv">
                <label class="form-control-label" for="chooseFile">Выберите CSV файл</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">

                <ul>
                    <li>Загрузите файл:</li>
                </ul>
            </button>
        </form>
        <?php

var_dump($POST);
$pdo = new PDO("pgsql:host=localhost;dbname=Pizza-Shop","postgres", "vagon1977");
$sql = "INSERT INTO categories(name, code) VALUES(:name, :code)";
$statement = $pdo->prepare()($sql);
$statement->bindParam(":name", $_POST['name']);
$statement->bindParam(":code", $_POST['code']);
$statement->execute();


// [           'name' => "qwrqwr",
//             'code' => "sdgsdg",
//             // 'description' => "fhdfhd",
//             // 'image' => $row['image'],
//             // 'name_en' => $row['name_en'],
//             // 'description_en' => $row['description_en'],
//             // 'count' => $row['count'],
// ];
?>
        <br>
        <form method="POST" enctype="multipart/form-data" action="{{ route('categories.categoryimport') }}">

            <div class="form-group">
                <input type="file" name="file" class="form-control" id="chooseFile" accept=".csv">
                <label class="form-control-label" for="chooseFile">Выберите CSV файл</label>

                {{-- {{ $errors->first('file') }} --}}
                @csrf
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-block mt-4">
                <ul>
                    <li>Импорт:</li>
                </ul>
            </button>
        </form>
    </div>

</body>
</html>

