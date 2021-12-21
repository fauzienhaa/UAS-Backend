<?php

namespace App\Controllers;

use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }
    // public function index($id = 0)
    // {
        
    //     $data = [
    //         'title' => 'Jadwal Kereta',
    //         'jadwal'=> $this->keretaModel->getKereta($id)
    //     ];


    //     if(empty($data['jadwal'])){

    //     }

    //     return view('jadwal/detail', $data);
    // }
    public function index($id)
    {
        $data['title'] = 'Jadwal Kereta';

        $this->jadwalModel    ->select('jadwal_kereta.kode_kereta as kodker, stasiun, datang, berangkat, nama');
        $this->jadwalModel    ->join('kereta', 'kereta.id = jadwal_kereta.kode_kereta');
        $this->jadwalModel    ->where('jadwal_kereta.kode_kereta', $id);
        // $query = $this->jadwalModel->get();

        // $data['jadwal'] = $query->getResult();

        // return view('jadwal/detail', $data);

        $data = [
            'title' => 'Detail Tiket',
            'jadwal'=> $this->jadwalModel->getJadwal($id)
        ];


        if(empty($data['jadwal']))
        {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Id Bus ' . $kode_kereta . 'tidak
            // ditemukan');
        }

        return view('jadwal/detail', $data);
    }

    // public function edit($id)
    // {
    //     $data = [
    //         'title' => 'Form Edit Jadwal',
    //         'validation' => \Config\Services::validation(),
    //         'jadwal' => $this->jadwalModel->getJadwal($id)
    //     ];

    //     return view('jadwal/edit', $data);
    // }

    // public function update($id)
    // {

    //     if(!$this->validate([
    //         'stasiun' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Nama Stasiun silahkan diisi',
    //             ]
    //             ],
    //         'waktu_datang' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Waktu tiba silahkan diisi',
    //             ]
    //             ],
    //         'waktu_berangkat' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Waktu berangkat silahkan diisi',
    //             ]
    //             ],
    //         'tujuan' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Tujuan silahkan diisi',
    //             ]
    //             ],
    //     ])) {
    //         // $validation = \Config\Services::validation();

    //         return redirect()->to('/jadwal/edit/' . $this->request->getVar('id'))->withInput();
    //     }

    //     $this->jadwalModel->save([
    //         'id_jadwal' => $id,
    //         'stasiun' => $this->request->getVar('stasiun'),
    //         'datang' => $this->request->getVar('waktu_datang'),
    //         'berangkat' => $this->request->getVar('waktu_berangkat'),
    //         'tujuan' => $this->request->getVar('tujuan'),
    //         // 'kode_kereta' => $this->request->getVar('kode_kereta'),
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil diubah');

    //     return redirect()->to('/jadwal');
    // }

    // public function delete($id)
    // {
    //     {
    //         $data['title'] = 'Jadwal Delete';
    
    //         $this->jadwalModel->where('jadwal.id', $id);
    //         $query = $this->jadwalModel->delete();
    
    //         if(empty($data['jadwal'])) {
    //             return redirect()->to('/jadwal');
    //         }
    
    //         return view('jadwal/detail', $data);
    //     }

    //     // $this->keretaModel->delete($id);
    //     // return redirect()->to('/tiket');
    // }
}
