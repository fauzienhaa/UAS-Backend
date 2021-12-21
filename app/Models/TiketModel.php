<?php 

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = 'tiket';
    protected $allowedFields = ['id','id_kereta', 'kode_kereta', 'tujuan', 'waktu_berangkat', 'waktu_tiba',
    'jumlah_tiket', 'harga'];

    public function getTiket($kode_kereta = false)
    {
        if ($kode_kereta == false){
            return $this->findAll();
        }

        return $this->where(['kode_kereta' => $kode_kereta])->first();
    }

    public function delete_data($kode_kereta)
    {
        return $this->db->table($this->table)->delete(['kode_kereta' => $kode_kereta]);
    }
}

