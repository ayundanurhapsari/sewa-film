<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetAutoPageBreak(false);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'_________________________________',0,1,'C');
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->Cell(190,7,'NOTA SEWA FILM',0,1,'C');
        $pdf->Cell(190,7,'_________________________________',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        
        $sewa_film = $this->db->get('sewa')->result();
        foreach ($sewa_film as $row){
            $pdf->Cell(88,6,'                                              Film yang dipilih              : ',0,0,'');
            $pdf->Cell(42,6,$row->film_id,0,1);
            $pdf->Cell(88,6,'                                              Nama Penyewa              : ',0,0,'');
            $pdf->Cell(42,6,$row->nama_penyewa,0,1);
            $pdf->Cell(88,6,'                                              Nomor Rekening            :',0,0,'');
            $pdf->Cell(20,6,$row->nomor_rekening,0,1);
            $pdf->Cell(88,6,'                                              Periode Tanggal Sewa   :',0,0,'');
            $pdf->Cell(20,6,$row->tgl_mulai_sewa.'  sampai  '.$row->tgl_selesai_sewa,0,1);
            $pdf->Cell(88,6,'                                              Total Harga Sewa          :',0,0,'');
            $pdf->Cell(42,6,'Rp '. $row->total_harga_sewa,0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,7,'_________________________________',0,1,'C');
        
            $pdf->Output();
    }
  }
}