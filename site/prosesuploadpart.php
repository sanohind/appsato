<?php
require '../vendor/autoload.php';
include '../main.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if (isset($_FILES['file_excel_part']['name']) && in_array($_FILES['file_excel_part']['type'], $file_mimes)) {

    $arr_file = explode('.', $_FILES['file_excel_part']['name']);
    $extension = end($arr_file);

    if ('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }

    $spreadsheet = $reader->load($_FILES['file_excel_part']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    //print_r($sheetData);
    for ($i = 1; $i < count($sheetData); $i++) {
        $partno     = $sheetData[$i]['0'];
        $partname   = $sheetData[$i]['1'];
        $model      = $sheetData[$i]['2'];
        $cust       = $sheetData[$i]['3'];
        $head       = $sheetData[$i]['4'];
        $qty        = $sheetData[$i]['5'];
        $warna      = $sheetData[$i]['6'];
        //mysqli_query($koneksi,"insert into tb_siswa (id_siswa,nama,kelas,alamat) values ('','$nama','$kelas','$alamat')");
        $cekExist = $part->checkRecord($partno);
        //echo $cekExist;
        $update = 0;
        $new = 0;
        if ($cekExist > 0) {
            $update = $update++;
            $data = [
                'pname'     => $partname,
                'model'     => $model,
                'cust'      => $cust,
                'header'    => $head,
                'qty'       => $qty,
                'warna'     => $warna,
                'partno'    => $partno
            ];
            $res = $part->updatePart($data);
        } else {
            $data = [
                'partno'    => $partno,
                'pname'     => $partname,
                'model'     => $model,
                'cust'      => $cust,
                'header'    => $head,
                'qty'       => $qty,
                'warna'     => $warna
            ];
            $res = $part->registerPart($data);
            $new = $new++;
        }
    }
    //echo "data update = ". $update . ". data baru = ".$new.".";
    header("Location: formpart.php?message=success");
}
