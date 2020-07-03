<?php
class m_sewa extends CI_Model {

    function get_data_sewa_byid_sewa($id_sewa){
        $hsl=$this->db->query("SELECT * FROM sewa JOIN film ON film.id_film=sewa.film WHERE id_sewa='$id_sewa'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'id_sewa' => $data->id_sewa,
			        'nama_penyewa' => $data->nama_penyewa,
			        'nomor_rekening' => $data->nomor_rekening,
                    'tgl_mulai_sewa' => $data->tgl_mulai_sewa,
                    'tgl_selesai_sewa' => $data->tgl_selesai_sewa,
                    'total_harga_sewa' => $data->total_harga_sewa,
                    );
            }
        }
        return $hasil;
    }

    function tampil_data() {  
        $query = $this->db->get('id_film');
        return $query;
    }
   

/**dropdown nama film*/
    function get() {
        $query = $this->db->query('SELECT * FROM film');
        return $query->result();
    }

    function tambah_sewa(){
        $data  = array(
            'film_id' => $this->input->post('film_id'),
            'nama_penyewa' => $this->input->post('nama_penyewa'),
            'nomor_rekening' => $this->input->post('nomor_rekening'),
            'tgl_mulai_sewa' => $this->input->post('tgl_mulai_sewa'), 
            'tgl_selesai_sewa' => $this->input->post('tgl_selesai_sewa'),
            'total_harga_sewa' => $this->input->post('total_harga_sewa'),
    );
        $this->db->insert('sewa',$data);
        redirect('../sewa');
    }
}
