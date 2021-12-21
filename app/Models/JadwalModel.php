<?php 

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal_kereta';
    protected $allowedFields = ['kode_kereta', 'stasiun', 'datang', 'berangkat'];

    public function getJadwal ($id = false)
    {
        if ($id == false){
            return $this->findAll();
        }

        return $this->where(['id' => $id])->findAll();
    }
}
