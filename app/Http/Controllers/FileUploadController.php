<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;


class FileUploadController extends Controller
{
    public function createForm()
    {
        return view('file-upload');
    }

    public function fileUpload(Request $req)
    {
        // $req->validate([
        //     'file' => 'required|max:10000|mimes:txt'
        // ]);

        $fileModel = new File;

        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            // $fileSize = size() . '_' . $req->file->getClientSize();
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            // echo  $request->all();
            // $file->SummaryText = File::get($file->getRealPath());
            // $fileName->SummaryText = file_get_contents($fileName->getRealPath());
            print_r();
            return back()
                ->with('success', 'File has been uploaded')
                ->with('file', $fileName);
            // echo "Upload: " . $fileName["file"]["name"] . "<br />";
            // echo "Type: " . $fileName["file"]["type"] . "<br />";
            // echo "Size: " . ($fileName["file"]["size"] / 1024) . " Kb<br />";
            // echo "Temp file: " . $fileName["file"]["tmp_name"] . "<br />";
        }

        /*When the user types the word*/
        //  $search = $_POST["text"];
        //  /*The website*/
        //  $page = $_POST["web"];
        //  $web = file_get_contents($page);
        //  /*Count words*/
        //  $result = (substr_count(strip_tags(strtolower($web)), strtolower($search)));
        // /*Display the information*/
        // if($result == 0){
        // echo "слова " .mb_strtoupper($search). "нет на сайте";
        // }else{
        // echo "слово " .mb_strtoupper($search). " встречается $result times";
        // }
        //         # Get an array with lowercase words
        // $array_with_words = str_word_count(strtolower('string to analyze'), 1);

        // # Get a count of all unique values
        // $array_with_words_count = array_count_values($array_with_words);

        // # Get the count of the word you are looking for
        // $your_count = $array_with_words_count[ strtolower('your_word') ];
        //         /*Count words*/
        // $result = preg_match_all('/\b'. strtolower($search) .'\b/', strtolower($web));


        // $word = $_POST['word'];
        // $url = $_POST['url'];
        // $anchor = file_get_contents($url);
        // preg_match('#<a\s+[^>]*href="' . preg_quote($site) . '*"[^>]*>(.+)</a>#Uis', $anchor, $matches);
        // echo ($matches[1]);

        // $word = $request->word;
        // $request->word = $filename;
        // $data->name = $request->name;
        // $data->url = $request->url;
        // $file = file_get_contents("file.txt");
        // $file = wp_get_attachment_url($file);

        // if($file):
        //     $word = $file('word');
        //     $url = $file('url');
        // if (strpos(file_get_contents ("word.txt")
        //     echo "Есть такое слово!<br>";
        // else echo "Есть такое слово!<br>";


        // $page = file_get_contents ( 'url' );
        //     $count_words = preg_match_all ( 'word', $page );
        //     echo 'Количество таких слов: ', $count_words, '<br />';
        //     print_r ( $matches );

        // if (strpos(file_get_contents("C:\Users\Админ\Downloads\Группа крови.txt"), "группа"))
        // if (strpos(file_get_contents("./assets/1636627002.txt"), "крови"))
        if (strpos(file_get_contents("https://teksty-pesenok.ru/rus-viktor-coj/tekst-pesni-gruppa-krovi/5225196/"), "рукаве"))
            echo "Есть такое слово!<br>";
        else echo "Есть такое слово!<br>";

        // $txt = file_get_contents("C:\Users\Админ\Downloads\Группа крови.txt");
        // $txt = file_get_contents("./assets/1636627002.txt");
        $txt = file_get_contents("https://teksty-pesenok.ru/rus-viktor-coj/tekst-pesni-gruppa-krovi/5225196/");
        echo "Слово рукаве встречается " . substr_count($txt, "рукаве") . "раз<br>";
    }
}
// fileUpload($_FILES['file']);
// addCategory($_POST['name'], $_POST['code']);
// require 'Category.php';
// $filename = fileUpload($_FILES['image']);
// addCategory($POST['name'], $_POST['code'], $filename);

// $file = fopen("f.txt", "r");
// if (!$file){
// echo "Файл не найден.";
// exit;
// }
// echo "<b>Содержимое файла:</b><br>";
// while (!feof($file)){
// $string = fgets($file, 100);
// echo $string."<br>";
// }
// fclose($file);
// $txt = file_get_contents("f.txt");
// echo "Слово xxx встречается ".substr_count($txt,"xxx")." раз<br>";
// echo "Слово yyy встречается ".substr_count($txt,"yyy")." раз";
