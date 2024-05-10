<?php
echo '<table border="1">';
$start_row = 1;
$csv_file_path = "C:/xampp/htdocs/TrendyClothes/data.csv"; 

if (($csv_file = fopen($csv_file_path, "r")) !== FALSE) {
    while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
        $column_count = count($read_data);
        echo '<tr>';
        $start_row++;
        for ($c = 0; $c < $column_count; $c++) {
            echo "<td>" . $read_data[$c] . "</td>"; // Corrected the closing tag for <td>
        }
        echo '</tr>';
    }
    fclose($csv_file);
}
echo '</table>';

$col = 3;

// open the file for reading
$file = fopen("C:/xampp/htdocs/TrendyClothes/data.csv","r");

// while there are more lines, keep doing this
while(! feof($file))
{
    // print out the given column of the line
    echo fgetcsv($file)[$col]."\n";
}

// close the file connection
fclose($file);
?>
