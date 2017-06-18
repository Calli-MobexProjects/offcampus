<?php 
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename = lecturer-data.csv');

//Creating a pointer connected to the output stream
$output = fopen('php://output', 'w');

//output the column headings
fputcsv($output, array('Column 1','Column 2','Column 3'));
 ?>