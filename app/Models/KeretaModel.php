<?php 

namespace App\Models;

use CodeIgniter\Model;

class KeretaModel extends Model
{
    protected $table = 'kereta';
    protected $allowedFields = ['id', 'kode_kereta', 'nama', 'jurusan', 'kelas', 'jumlah_kursi'];

    public function getKereta ($id = false)
    {
        if ($id == false){
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function delete_data($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
