<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }
    // ============================================================================================
    // Laporan Penjualan 
    public function laporanpenjualan()
    {
        $pdf = new FPDF("P", 'mm', 'A4');
        $pdf->AddPage();
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
    }
    public function laporanpenjualanheader()
    {
        $this->load->view('penjualan/report_header_only');
    }
    public function laporanpenjualanfull()
    {
        $this->load->view('penjualan/report_laporanpenjualanfull');
    }

    public function laporanpenjualankustom()
    {
        $this->load->view('penjualan/report_laporanpenjualanfull');
    }
    // ============================================================================================
    // Laporan Stok
    public function laporanstok()
    {
        $pdf = new FPDF("P", 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA KUSTOMER', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NAMA CUSTOMER', 1, 0, 'C');
        $pdf->Cell(30, 6, 'TELP', 1, 0, 'C');
        $pdf->Cell(45, 6, 'ALAMAT', 1, 1, 'C');
        $i = 1;

        $data = $this->db->get('stok')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(37, 6, $d['nik'], 1, 0);
            $pdf->Cell(37, 6, $d['name'], 1, 0);
            $pdf->Cell(30, 6, $d['telp'], 1, 0);
            $pdf->Cell(45, 6, $d['alamat'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_customer.pdf', 'I');
    }
    public function laporanstokheader()
    {
        $this->load->view('stok/report_header_only');
    }
    public function laporanstokfull()
    {
        $this->load->view('stok/report_laporanstokfull');
    }

    public function laporanstokkustom()
    {
        $this->load->view('stok/report_laporanstokfull');
    }
    // ============================================================================================
    // Laporan Pembelian
    public function laporanpembelian()
    {
        $pdf = new FPDF("P", 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA PEMBELIAN', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NAMA SUPPLIER', 1, 0, 'C');
        $pdf->Cell(30, 6, 'INVOICE', 1, 0, 'C');
        $pdf->Cell(37, 6, 'TOTAL BAYAR', 1, 0, 'C');
        $pdf->Cell(25, 6, 'BAYAR', 1, 0, 'C');
        $pdf->Cell(32, 6, 'DISKRIPSI', 1, 0, 'C');
        $pdf->Cell(20, 6, 'TANGGAL', 1, 1, 'C');
        $i = 1;
        $dbpembelian = $this->db->get('pembelian')->result_array();
        $dbsupplier = $this->db->get('supplier')->result_array();
        foreach ($dbpembelian as $pembelian) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            foreach ($dbsupplier as $supplier) {
                if (strcmp($pembelian['supplier_id'], $supplier['id']) == 0)
                    $pdf->Cell(37, 6, $supplier['name'], 1, 0);
            }
            $pdf->Cell(30, 6, $pembelian['invoice'], 1, 0);
            $pdf->Cell(37, 6, $pembelian['total'], 1, 0);
            $pdf->Cell(25, 6, $pembelian['bayar'], 1, 0);
            $pdf->Cell(32, 6, $pembelian['diskripsi'], 1, 0);
            $pdf->Cell(20, 6, $pembelian['tanggal'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_penjualan.pdf', 'I');
    }
    public function laporanpembelianheader()
    {
        $this->load->view('pembelian/report_header_only');
    }
    public function laporanpembelianfull()
    {
        $this->load->view('pembelian/report_laporanpembelianfull');
    }

    public function laporanpembeliankustom()
    {
        $this->load->view('pembelian/report_laporanpembelianfull');
    }
    // ============================================================================================
    // Laporan Barang
    public function laporanbarang()
    {
        $pdf = new FPDF("P", 'mm', 'A4');
        $pdf->AddPage();
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
            $pdf->Cell(20, 6, $barang['harga_jual'], 1, 0);
            $pdf->Cell(20, 6, $barang['harga_beli'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_barang.pdf', 'I');
    }
    public function laporanbarangheader()
    {
        $this->load->view('barang/report_header_only');
    }
    public function laporanbarangfull()
    {
        $this->load->view('barang/report_laporanbarangfull');
    }

    public function laporanbarangkustom()
    {
        $this->load->view('barang/report_laporanbarangfull');
    }

    // ============================================================================================
    // Laporan Stok Barang
    public function laporanstokbarang()
    {
        $pdf = new FPDF("P", 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA PEMBELIAN', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(20, 6, 'NAMA BARANG', 1, 0, 'C');
        $pdf->Cell(30, 6, 'BARKODE', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kaategori', 1, 0, 'C');
        $pdf->Cell(25, 6, 'SATUAN', 1, 0, 'C');
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
            $pdf->Cell(20, 6, $barang['harga_jual'], 1, 0);
            $pdf->Cell(20, 6, $barang['harga_beli'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_barang.pdf', 'I');
    }
    public function laporanstokbarangheader()
    {
        $this->load->view('barang/report_header_only');
    }
    public function laporanstokbarangfull()
    {
        $this->load->view('barang/report_laporanbarangfull');
    }

    public function laporanstokbarangkustom()
    {
        $this->load->view('barang/report_laporanbarangfull');
    }
    // ============================================================================================
    // Laporan Kustomer
    public function laporankustomer()
    {
        $pdf = new FPDF("P", 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA KUSTOMER', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NAMA CUSTOMER', 1, 0, 'C');
        $pdf->Cell(30, 6, 'TELP', 1, 0, 'C');
        $pdf->Cell(45, 6, 'ALAMAT', 1, 1, 'C');
        $i = 1;
        $data = $this->db->get('kustomer')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(37, 6, $d['nik'], 1, 0);
            $pdf->Cell(37, 6, $d['name'], 1, 0);
            $pdf->Cell(30, 6, $d['telp'], 1, 0);
            $pdf->Cell(45, 6, $d['alamat'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_customer.pdf', 'I');
    }
    public function laporankustomerheader()
    {
        $this->load->view('kustomer/report_header_only');
    }
    public function laporankustomerfull()
    {
        $this->load->view('kustomer/report_laporankustomerfull');
    }

    public function laporankustomerkustom()
    {
        $this->load->view('kustomer/report_laporankustomerfull');
    }
    // ============================================================================================

}