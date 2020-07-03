<option value='' selected="selected">Avengers</option>
                      <option value='' selected="selected">Imperfect</option>
                      <option value='' selected="selected">Bumi Manusia</option>
                      <option value='' selected="selected">-- Pilih --</option>

 <!--harusnya pake yang ini-->
 <?php foreach($data->result() as $row){ ?>
                        <option value="<?php echo $row->id_film; ?>"><?php echo $row->nama_film; ?></option>
                      <?php } ?>


<!--Laporanpdf-->
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

/**jajal*/
<form action="" method="post">
    <div class="row">
        <label>Pilih Film</label>
        <input type="text" name="nama_film" value="<?=isset($_POST['nama_film']) ? $_POST['nama_film'] : ''?>"/>
    </div>
    <div class="row">
        <label>Nama Penyewa</label>
        <input type="text" name="nama_penyewa" value="<?=isset($_POST['nama_penyewa']) ? $_POST['nama_penyewa'] : ''?>"/>
    </div>
    <div class="row">
        <label>Nomor Rekening Penyewa</label>
        <input type="text" name="nomor_rekening" value="<?=isset($_POST['nomor_rekening']) ? $_POST['nomor_rekening'] : ''?>"/>
    </div>
   
    <div class="row">
        <input type="submit" name="submit" value="Simpan"/>
    </div>
</form>

<?php
    if (isset($_POST['submit'])) {
        echo '<h1>Hasil Input</h1>';
        echo '<ul>';
        echo '<li>Nama Film: ' . $_POST['nama_film'] . '</li>';
        echo '<li>Nama Penyewa: ' . $_POST['nama_penyewa'] . '</li>';
        echo '<li>Nomor Rekening: ' . $_POST['nomor_rekening'] . '</li>';
        echo '</ul>';
    }
?>
