<?php

namespace App\Controllers;

use App\Models\KeretaModel;

class Kereta extends BaseController
{
    protected $keretaModel;
    public function __construct()
    {
        $this->keretaModel = new KeretaModel();
    }

    public function index()
    {
        $data['title'] = 'Kereta List';

        $query = $this->keretaModel->get();

        $data['kereta'] = $query->getResult();

        return view('kereta/index', $data);
    }
    
    public function detail($id = 0)
    {
        
        $data = [
            'title' => 'Detail Kereta',
            'kereta'=> $this->keretaModel->getKereta($id)
        ];


        if(empty($data['kereta'])){

        }

        return view('kereta/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Kereta',
            'validation' => \Config\Services::validation()
        ];

        return view('kereta/create', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'kode_kereta' => [
                'rules' => 'required|is_unique[kereta.kode_kereta]',
                'errors' => [
                    'required' => 'Kode Kereta silahkan diisi',
                    'is_unique' => 'Kode Kereta sudah pernah terdaftar'
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

            return redirect()->to('/kereta/create')->withInput();
        }

        $this->keretaModel->save([
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'kode_kereta' => $this->request->getVar('kode_kereta'),
            'kelas' => $this->request->getVar('kelas'),
            'jumlah_kursi' => $this->request->getVar('jumlah_kursi')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/kereta');
    }


    public function delete($id)
    {
        {
            $data['title'] = 'Kereta Delete';
    
            $this->keretaModel->where('kereta.id', $id);
            $query = $this->keretaModel->delete();
    
            if(empty($data['kereta'])) {
                return redirect()->to('/kereta');
            }
    
            return view('kereta/detail', $data);
        }

        // $this->keretaModel->delete($id);
        // return redirect()->to('/tiket');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Kereta',
            'validation' => \Config\Services::validation(),
            'kereta' => $this->keretaModel->getKereta($id)
        ];

        return view('kereta/edit', $data);
    }

    public function update($id)
    {

        if(!$this->validate([
            'kode_kereta' => [
                'rules' => 'required|is_unique[kereta.kode_kereta]',
                'errors' => [
                    'required' => 'Kode Kereta silahkan diisi',
                    'is_unique' => 'Kode Kereta sudah pernah terdaftar'
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

            return redirect()->to('/kereta/edit/' . $this->request->getVar('id'))->withInput();
        }

        $this->keretaModel->save([
            'id' => $id,
            'kode_kereta' => $this->request->getVar('kode_kereta'),
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'kelas' => $this->request->getVar('kelas'),
            'jumlah_kursi' => $this->request->getVar('jumlah_kursi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/kereta');
    }
}