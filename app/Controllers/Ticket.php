<?php

namespace App\Controllers;

use App\Models\TicketModel;

class Ticket extends BaseController
{
    protected $ticketModel;
    public function __construct()
    {
        $this->ticketModel = new TicketModel();
    }

    public function index()
    {
        //$data['title'] = 'Ticket List';

        //$query = $this->ticketModel->get();

        //$data['ticket'] = $query->getResult();

        //return view('ticket/index', $data);

        $data['title'] = 'Data Pemesanan';

        $this->ticketModel    ->select('ticket.id_user, id_ticket, id_jadwal, tujuan, berangkat, status');
        $this->ticketModel    ->join('users', 'users.id = ticket.id_user');
        $this->ticketModel    ->join('jadwal_kereta', 'jadwal_kereta.id_jadwal = ticket.jadwal');

        $query      = $this->ticketModel->get();


        $data['ticket'] = $query->getResult();
        return view('ticket/index', $data);
    }
    
    public function detail($id_ticket = 0)
    {
        
        $data = [
            'title' => 'Detail Ticket',
            'ticket'=> $this->ticketModel->getTicket($id_ticket)
        ];


        if(empty($data['ticket'])){

        }

        return view('ticket/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Ticket',
            'validation' => \Config\Services::validation()
        ];

        return view('ticket/create', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'kode_ticket' => [
                'rules' => 'required|is_unique[ticket.kode_ticket]',
                'errors' => [
                    'required' => 'Kode ticket silahkan diisi',
                    'is_unique' => 'Kode ticket sudah pernah terdaftar'
                ]
                ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama silahkan diisi',
                ]
                ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jurusan silahkan diisi',
                ]
                ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kelas silahkan diisi',
                ]
                ],
            'jumlah_kursi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah kursi silahkan diisi',
                ]
                ]
        ])) {
            // $validation = \Config\Services::validation();

            return redirect()->to('/ticket/create')->withInput();
        }

        $this->ticketModel->save([
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'kode_ticket' => $this->request->getVar('kode_ticket'),
            'kelas' => $this->request->getVar('kelas'),
            'jumlah_kursi' => $this->request->getVar('jumlah_kursi')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/ticket');
    }


    public function delete($id_ticket)
    {
        {
            $data['title'] = 'Ticket Delete';
    
            $this->ticketModel->where('ticket.id', $id_ticket);
            $query = $this->ticketModel->delete();
    
            if(empty($data['ticket'])) {
                return redirect()->to('/ticket');
            }
    
            return view('ticket/detail', $data);
        }

        // $this->keretaModel->delete($id);
        // return redirect()->to('/tiket');
    }

    public function edit($id_ticket)
    {
        $data = [
            'title' => 'Form Edit Ticket',
            'validation' => \Config\Services::validation(),
            'ticket' => $this->ticketModel->getTicket($id_ticket)
        ];

        return view('ticket/edit', $data);
    }

    public function update($id_ticket)
    {

        if(!$this->validate([
            'kode_ticket' => [
                'rules' => 'required|is_unique[ticket.kode_ticket]',
                'errors' => [
                    'required' => 'Kode ticket silahkan diisi',
                    'is_unique' => 'Kode ticket sudah pernah terdaftar'
                ]
                ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id bus silahkan diisi',
                    'is_unique' => 'id bus sudah pernah terdaftar'
                ]
                ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan silahkan diisi',
                ]
                ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'waktu tiba silahkan diisi',
                ]
                ],
            'jumlah_kursi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah tiket silahkan diisi',
                ]
                ],
        ])) {
            // $validation = \Config\Services::validation();

            return redirect()->to('/ticket/edit/' . $this->request->getVar('id_ticket'))->withInput();
        }

        $this->ticketModel->save([
            'id_ticket' => $id_ticket,
            'kode_ticket' => $this->request->getVar('kode_ticket'),
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'kelas' => $this->request->getVar('kelas'),
            'jumlah_kursi' => $this->request->getVar('jumlah_kursi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/ticket');
    }
}