<?php
echo '<table border="1">';
$start_row = 1;
$csv_file_path = "C:/xampp/htdocs/TrendyClothes/products.csv"; // Adjust the file path and extension as needed

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
?>
