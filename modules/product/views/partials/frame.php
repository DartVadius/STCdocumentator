<?php

$pdf = $_GET['pdf'];
print_r($pdf);
die;
//$product = $product->findOne($id);
if (file_exists($product->product_tech_map)) {
    die;
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
//            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
//            header('Content-Length: ' . filesize('../uploads/tech_map/1/14001.jpg'));
    echo file_get_contents($this->tech_map);
    exit();
}