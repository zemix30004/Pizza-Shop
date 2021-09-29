<?php

if ($_POST['submit']) {
// attempt a connection
$dbh = pg_connect("host=localhost dbname=Pizza-Shop user=postgres password=vagon1977");
if (!$dbh) {
die("Error in connection: " . pg_last_error());
}
// execute query
$sql = "COPY personaldetails(name, code, description, image) FROM '../storage/uploads' WITH DELIMITER ',' CSV";

$result = pg_query($dbh, $sql);
if (!$result) {
die("There was a problem uploading you data: " . pg_last_error());
}

echo "Data successfully inserted!";

// free memory
pg_free_result($result);

// close connection
pg_close($dbh);
}

?>
{{-- <pre>
    <?php
   print_r($_FILES);
   </pre> --}}
{{-- COPY "categories" FROM '/path/to/csvfile' DELIMITER ',' CSV; --}}
{{-- COPY "categories" FROM 'C:\OpenServer\domains\Pizza-Shop\storage\app\public\uploads\1632416784_categories.csv'
WITH CSV HEADER DELIMITER ','; --}}
{{-- COPY "categories" FROM 'C:\OpenServer\domains\Pizza-Shop\storage\app\public\uploads\1632416784_categories.csv'
WITH CSV HEADER DELIMITER  E'\t'; --}}
{{-- COPY articles FROM '[insert .csv dir here]' DELIMITERS ',' CSV; --}}
{{-- copy categories from '/home/pgsql/ipligence-lite.csv' delimiter as ',' csv quote as '""'; --}}
{{-- COPY "categories" FROM 'C:\OpenServer\domains\Pizza-Shop\storage\app\public\uploads\1632416784_categories.csv' DELIMITER as ',';
C:/Program Files/PostgreSQL/13/data --}}
{{-- COPY "categories" (name, code, description, image) FROM '../storage/uploads' WITH DELIMITER ',' CSV --}}
{{-- COPY "categories" (name, code, description, image) FROM 'C:\OpenServer\domains\Pizza-Shop\storage\app\public\uploads\1632416784_categories.csv' WITH DELIMITER ',' CSV --}}
{{-- C:\OpenServer\domains\Pizza-Shop\storage\app\public\uploads\1632417308_categorylist (7).csv --}}
{{-- COPY "categories" (id, name, code, description) FROM 'C:\OpenServer\domains\Pizza-Shop\storage\app\public\uploads\1632417308_categorylist (7).csv' WITH DELIMITER ',' CSV; --}}
// COPY SupEnh_AGK50kb_K27ac
// FROM 'G:\CarrollLab\EnhancerAnalysis\AGK_K27ac.KeyFile'
// WITH (FORMAT 'csv', DELIMITER E'\t', NULL 'NULL',HEADER);



