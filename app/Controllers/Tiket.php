<?php

namespace App\Controllers;

use App\Models\TiketModel;

class Tiket extends BaseController
{
    protected $tiketModel;
    public function __construct()
    {
        $this->tiketModel = new TiketModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Daftar Tiket',
            'tiket' => $this->tiketModel->getTiket()
        ];


        return view('tiket/index', $data);
    }
    
    public function detail($kode_kereta)
    {
        
        $data = [
            'title' => 'Detail Tiket',
            'tiket'=> $this->tiketModel->getTiket($kode_kereta)
        ];


        if(empty($data['tiket']))
        {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Id Bus ' . $kode_kereta . 'tidak
            // ditemukan');
        }

        return view('tiket/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Tiket',
            'validation' => \Config\Services::validation()
        ];

        return view('tiket/create', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'id_kereta' => [
                'rules' => 'required|is_unique[tiket.id_kereta]|is_unique[tiket.kode_kereta]',
                'errors' => [
                    'required' => 'id kereta silahkan diisi',
                    'is_unique' => 'id kereta sudah pernah terdaftar'
                ]
                ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan silahkan diisi',
                ]
                ],
            'waktu_berangkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'waktu berangkat silahkan diisi',
                ]
                ],
            'waktu_tiba' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'waktu tiba silahkan diisi',
                ]
                ],
            'jumlah_tiket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah tiket silahkan diisi',
                ]
                ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harga tiket silahkan diisi',
                ]
                ]
        ])) {
            // $validation = \Config\Services::validation();

            return redirect()->to('/tiket/create')->withInput();
        }

        $kode_kereta = url_title($this->request->getVar('id_kereta'), '-', true);
        $this->tiketModel->save([
            'id_kereta' => $this->request->getVar('id_kereta'),
            'kode_kereta' => $kode_kereta,
            'tujuan' => $this->request->getVar('tujuan'),
            'waktu_berangkat' => $this->request->getVar('waktu_berangkat'),
            'waktu_tiba' => $this->request->getVar('waktu_tiba'),
            'jumlah_tiket' => $this->request->getVar('jumlah_tiket'),
            'harga' => $this->request->getVar('harga')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/tiket');
    }


    public function delete($kode_kereta)
    {
        $hapus = $this->tiketModel->delete_data($kode_kereta);
        if ($hapus) {
            session()->setFlashdata('danger', 'Berhasil Menghapus Data');
            return redirect()->to(base_url('Tiket'));
        }
    }


    public function edit($kode_kereta)
    {
        $data = [
            'title' => 'Form Edit Tiket',
            'validation' => \Config\Services::validation(),
            'tiket' => $this->tiketModel->getTiket($kode_kereta)
        ];

        return view('tiket/edit', $data);
    }

    public function update($id)
    {

        $tiketLama = $this->tiketModel->getTiket($this->request->getVar('kode_kereta'));
        if ($tiketLama['id_kereta'] == $this->request->getVar('id_kereta')){
            $rule_id_kereta = 'required';
        } else {
            $rule_id_kereta = 'required|is_unique[tiket.id_kereta]';
        }

        if(!$this->validate([
            'id_kereta' => [
                'rules' => $rule_id_kereta,
                'errors' => [
                    'required' => 'id kereta silahkan diisi',
                    'is_unique' => 'id kereta sudah pernah terdaftar'
                ]
                ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan silahkan diisi',
                ]
                ],
            'waktu_berangkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'waktu berangkat silahkan diisi',
                ]
                ],
            'waktu_tiba' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'waktu tiba silahkan diisi',
                ]
                ],
            'jumlah_tiket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah tiket silahkan diisi',
                ]
                ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harga tiket silahkan diisi',
                ]
                ]
        ])) {
            // $validation = \Config\Services::validation();

            return redirect()->to('/tiket/edit/' . $this->request->getVar('kode_kereta'))->withInput();
        }

        $kode_kereta = url_title($this->request->getVar('id_kereta'), '-', true);
        $this->tiketModel->save([
            'id' => $id,
            'id_kereta' => $this->request->getVar('id_kereta'),
            'kode_kereta' => $kode_kereta,
            'tujuan' => $this->request->getVar('tujuan'),
            'waktu_berangkat' => $this->request->getVar('waktu_berangkat'),
            'waktu_tiba' => $this->request->getVar('waktu_tiba'),
            'jumlah_tiket' => $this->request->getVar('jumlah_tiket'),
            'harga' => $this->request->getVar('harga')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/tiket');
    }
}