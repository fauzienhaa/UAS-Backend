<?php 

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'id_ticket';
    protected $allowedFields = ['id_ticket', 'kode_ticket', 'nama', 'jurusan', 'kelas', 'jumlah_kursi'];

    public function getTicket ($id_ticket = false)
    {
        if ($id_ticket == false){
            return $this->findAll();
        }

        return $this->where(['id_ticket' => $id_ticket])->first();
    }

    public function delete_data($id_ticket)
    {
        return $this->db->table($this->table)->delete(['id_ticket' => $id_ticket]);
    }

    public function getTicketKereta($id_ticket)
    {
        return
            $this->db->table('ticket')
            ->join('kereta', 'ticket.id=kereta.id')
            ->where("ticket.id_ticket='" . $id_ticket . "'")
            ->get()->getResultArray();
    }



}
