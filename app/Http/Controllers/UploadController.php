<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    $csv = array();

// check there are no errors
if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
    $type = $_FILES['csv']['type'];
    // $tmpName = $_FILES['csv']['tmp_name'];

    $tmpName = $_FILES['csv']['tmp_name'];
$csvAsArray = array_map('str_getcsv', file($tmpName));

    // check the file is a csv
    if($ext === 'csv'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);

            $row = 0;

            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // number of fields in the csv
                $col_count = count($data);

                // get the values from the csv
                $csv[$row]['col1'] = $data[0];
                $csv[$row]['col2'] = $data[1];

                // inc the row
                $row++;
                }
                fclose($handle);
            }
        }
    }
}
// pgsql = new pssql('localhost, 'postgres', 'vagon 1977', 'Pizza-Shop');
// $file = fopen('test.csv', 'r');

// while(!feof($file)) {
//     $mass = fgetcsv($file, 1024, ';');
//     echo $mass[0];
//     echo $mass[1];
//     echo $mass[2];
//     echo $mass[3]
//     $pgsql>query("INSERT INTO `table` (`col_1`,`col_2`,`col_3`,`col_4`) VALUES ('{$mass[0]}', '{$mass[1}', '{$mass[2]}', '{$mass[3]}')");
// // }
// fclose($file);
// $pgsql->close();



