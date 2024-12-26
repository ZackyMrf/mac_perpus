<?php

namespace App\Controllers;

use App\Models\BukuModel;


class BukuController extends BaseController
{

    var $BukuModel;
    public function __construct()
    {

        $this->BukuModel = new BukuModel();
    }
    public function index(): string
    {
        $data = [

            'title' => 'Daftar Buku',
            'buku' =>   $this->BukuModel->findAll()

        ];

        return view('home', $data);
    }

    public function detail($idBuku)
    {

        $buku = $this->BukuModel->where(['id_buku' => $idBuku])->first();

        $data = [

            'title' => 'Detail',
            'buku' => $buku


        ];
        return view('detail', $data);
    }

    public function create()
    {

        $data = [
            'title' => "Tambah Data Buku",
            'validate' =>  session()->get('validate')

        ];


        return view('create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan judul harap diisi"
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan pengarang harap diisi"
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan penerbit harap diisi"
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => "Inputan tahun terbit harap diisi",
                    'integer' => 'Data harus berupa angka'
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]|max_size[sampul,2024]',
                'errors' => [
                    'uploaded' => 'Inputan sampul harap diunggah',
                    'is_image' => 'File yang diunggah harus berupa gambar',
                    'mime_in' => 'Format gambar harus jpg, jpeg, atau png',
                    'max_size' => 'File terlalu besar'
                ]
            ]
        ])) {
            // $validate = \Config\Services::validation();
            $validate = $this->validator->getErrors();
            return redirect()->to('/buku/create')->withInput()->with('validate', $validate);
        }



        $fileSampul  = $this->request->getFile('sampul');


        $namaSampul = $fileSampul->getRandomName();


        $fileSampul->move('img', $namaSampul);

        $this->BukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul' => $namaSampul
        ]);



        session()->setFlashdata('success', "Data Berhasil di tambahkan");
        return redirect()->to('/');
    }

    public function delete($id_buku)
    {
        $bukuLama = $this->BukuModel->find($id_buku);;
        if (file_exists('img/' . $bukuLama['sampul'])) {
            unlink('img/' . $bukuLama['sampul']);
        }
        $this->BukuModel->delete($id_buku);


        session()->setFlashdata('success', 'Data berhasil di hapus');
        return redirect()->to('/');
    }

    public function edit($id_buku)
    {
        $data = [
            'title' => 'Edit data buku',
            'buku' => $this->BukuModel->where(['id_buku' => $id_buku])->first(),
            'validate' => session()->get('validate')

        ];
        return view('/update', $data);
    }

    public function update($id_buku)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan judul harap diisi"
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan pengarang harap diisi"
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan penerbit harap diisi"
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => "Inputan tahun terbit harap diisi",
                    'integer' => 'Data harus berupa angka'
                ]
                ],
            'sampul' => [
                'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]|max_size[sampul,2024]',
                'errors' => [
                   
                    'is_image' => 'File yang diunggah harus berupa gambar',
                    'mime_in' => 'Format gambar harus jpg, jpeg, atau png',
                    'max_size' => 'File terlalu besar'
                
                ]
            ]
        ])) {
            // $validate = \Config\Services::validation();
            $validate = $this->validator->getErrors();
            return redirect()->to("/buku/edit/$id_buku")->withInput()->with('validate', $validate);
        }

        // Mengambil file sampul yang diunggah
        $fileSampul = $this->request->getFile('sampul');

        // Mengambil data buku lama berdasarkan id_buku
        $bukuLama = $this->BukuModel->find($id_buku);

        // Cek apakah ada file sampul baru yang diunggah
        if ($fileSampul->getError() == 4) {
            // Tidak ada file baru yang diunggah, gunakan sampul lama
            $namaSampul = $bukuLama['sampul'];
        } else {
            // Ada file baru yang diunggah, generate nama random
            $namaSampul = $fileSampul->getRandomName();

            // Pindahkan file baru ke folder img
            $fileSampul->move('img', $namaSampul);

            // Hapus file gambar lama
            if (file_exists('img/' . $bukuLama['sampul'])) {
                unlink('img/' . $bukuLama['sampul']);
            }
        }

        // Update data buku
        $this->BukuModel->update($id_buku, [
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/');
    }
}
