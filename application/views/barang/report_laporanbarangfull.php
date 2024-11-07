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
$pdf->Cell(0, 5, 'LAPORAN DATA PEMBELIAN', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(20, 6, 'BARKODE', 1, 0, 'C');
$pdf->Cell(30, 6, 'NAMA', 1, 0, 'C');
$pdf->Cell(37, 6, 'SATUAN', 1, 0, 'C');
$pdf->Cell(25, 6, 'KATEGORI', 1, 0, 'C');
$pdf->Cell(32, 6, 'STOK', 1, 0, 'C');
$pdf->Cell(20, 6, 'HARGA BELI', 1, 0, 'C');
$pdf->Cell(20, 6, 'HARGA JUAL', 1, 1, 'C');
$i = 1;
$dbbarang = $this->db->get('barang')->result_array();
$dbkategori = $this->db->get('kategori')->result_array();
$dbsatuan = $this->db->get('satuan')->result_array();
foreach ($dbbarang as $barang) {
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(7, 6, $i++, 1, 0);
    $pdf->Cell(20, 6, $barang['barcode'], 1, 0);
    $pdf->Cell(30, 6, $barang['name'], 1, 0);
    foreach ($dbsatuan as $satuan) {
        if (strcmp($barang['satuan_id'], $satuan['id']) == 0)
            $pdf->Cell(37, 6, $satuan['name'], 1, 0);
    }
    foreach ($dbkategori as $kategori) {
        if (strcmp($barang['kategori_id'], $kategori['id']) == 0)
            $pdf->Cell(25, 6, $kategori['name'], 1, 0);
    }
    $pdf->Cell(32, 6, $barang['stok'], 1, 0);
    $pdf->Cell(20, 6, $barang['harga_jual'], 0, 0);
    $pdf->Cell(20, 6, $barang['harga_beli'], 1, 1);
}
$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_barang.pdf', 'I');