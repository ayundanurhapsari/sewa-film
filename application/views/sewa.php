    <section class="content-header">
      <h1><center>SEWA FILM</center></h1>

<!--Form-->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          
          <div class="box-body">
            <form method="POST"  action="<?php echo base_url(). 'sewa/add';?>" class="form-horizontal">
              <div class="form-group">
                <label for="nama_penyewa" class="col-sm-3 control-label">Nama Film</label>
                  <div class="col-sm-2 col-lg-2">
                    <select class="form-control" id="film_id" name="film_id" required >
                      <option value="">--Pilih Film--</option>
                      <?php foreach ($val as $row) {
                        echo "<option value='".$row->id_film."'>".$row->nama_film."</option>";
                      }
                      echo"
                    </select>"
                    ?>
                  </div>
              </div>

              <div class="form-group">
                <label for="nama_penyewa" class="col-sm-3 control-label">Nama Penyewa</label>
                  <div class="col-sm-3">
                    <input class="form-control input-sm" name="nama_penyewa" id="nama_penyewa" type="text" value="<?php echo (!empty($sewa[0]->id_sewa)) ? $sewa[0]->nama_penyewa : ''?>" required>
                  </div>
              </div>

              <div class="form-group">
                <label for="nomor_rekening" class="col-sm-3 control-label">Nomor Rekening Penyewa</label>
                  <div class="col-sm-3">
                    <input id="nomor_rekening" class="form-control input-sm digits required" type="text" name="nomor_rekening" minlength="16" maxlength="16">
                  </div>
              </div> 

              <div class="form-group">
                <label for="tgl_sewa"  class="col-sm-3 control-label">Periode Tanggal Sewa</label>
                  <div class="col-sm-1">
                    <p><span>Dari</span></p>
                  </div>
                  <div class="col-sm-3 col-lg-2">
                    <div class="input-group input-group-sm date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                        <input title="Pilih Tanggal" id="tgl_mulai_sewa" class="form-control input-sm required" name="tgl_mulai_sewa" type="date"/>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <p><span>Sampai</span></p>
                  </div>
                  <div class="col-sm-3 col-lg-1">
                    <div class="input-group input-group-sm date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                        <input title="Pilih Tanggal" id="tgl_selesai_sewa" class="form-control input-sm required" name="tgl_selesai_sewa" type="date"/>
                      </div>
                    </div>
                  </div>

              <div class="form-group">
                <label for="total_harga_sewa"  class="col-sm-3 control-label">Total Harga Sewa</label>
                  <div class="col-sm-3">
                    <input class="form-control input-sm" name="total_harga_sewa" id="total_harga_sewa" type="text">
                  </div>
              </div>

              <div class="box-footer">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group pull-left">
                      <button type="submit" class="btn btn-success btn-md">Simpan</button>
                      <a href="https://api.whatsapp.com/send?phone=6282143638069&text=Hallo,%20nama%20saya%20,%20saya%20ingin%20menyewa%20%3A%0A1.%20Judul%20film%20%3A%20%0A2.%20Nomor%20rekening%20%3A%20%0A3.%20Periode%20sewa%20%3A%20%20sampai%20%0A4.%20Total%20harga%20%20sewa%20%3A%20Rp.%0A" class="btn btn-info btn-md">Kirim Nota</a>
                    </div>
                    
                    <form action="<?php echo base_url('sewa/redirectLaporan'); ?>" method="POST">
                      <input type="hidden" name="pdf" id="pdf">
                        <div class="form-group pull-right">
                          <a href="<?php echo base_url('index.php/Laporanpdf'); ?>" class="btn btn-info btn-md" >Export PDF</a>
                        </div>
                    </form>
                    
                  </div>
                </div>
              </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!--End Form-->
</section>
