<?php
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 18);
$pdf->Image('./assets/img/cart.jpg', 30, 5, 27, 24);
$pdf->Cell(25);
$pdf->SetFont('Times', 'B', 20);
$pdf->Cell(0, 5, 'KOPERASI HARUM MANIS BERSATU', 0, 1, 'C');
$pdf->Cell(25);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0, 5, 'Website' . 'WWW.HARUMBERSATU.COM/ E-Mail: admin@harumbersatu.com', 0, 1, 'C');
$pdf->Cell(25);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0, 5, 'Banjarmasin utara. Telp. / Fax. 081349685149' . 'KOPERASI HARUM MANIS BERSATU', 0, 1, 'C');
$pdf->SetLineWidth(1);
$pdf->Line(10, 36, 197, 36);
$pdf->SetLineWidth(0);

$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA PENJUALAN', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(37, 6, 'NAMA SUPPLIER', 1, 0, 'C');
$pdf->Cell(30, 6, 'INVOICE', 1, 0, 'C');
$pdf->Cell(37, 6, 'TOTAL BAYAR', 1, 0, 'C');
$pdf->Cell(25, 6, 'BAYAR', 1, 0, 'C');
$pdf->Cell(32, 6, 'KEMBALI', 1, 0, 'C');
$pdf->Cell(20, 6, 'TANGGAL', 1, 1, 'C');
$i = 1;
$dbpenjualan = $this->db->get('penjualan')->result_array();
$dbkustomer = $this->db->get('kustomer')->result_array();
foreach ($dbpenjualan as $penjualan) {
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(7, 6, $i++, 1, 0);
    foreach ($dbkustomer as $kustomer) {
        if (strcmp($penjualan['kustomer_id'], $kustomer['id']) == 0)
            $pdf->Cell(37, 6, $kustomer['name'], 1, 0);
    }
    $pdf->Cell(30, 6, $penjualan['invoice'], 1, 0);
    $pdf->Cell(37, 6, $penjualan['total'], 1, 0);
    $pdf->Cell(25, 6, $penjualan['bayar'], 1, 0);
    $pdf->Cell(32, 6, $penjualan['kembali'], 1, 0);
    $pdf->Cell(20, 6, $penjualan['tanggal'], 1, 1);
}
$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_penjualan.pdf', 'I');