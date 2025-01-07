<?php
namespace App\Controllers;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $AnggotaModel;

    public function __construct()
    {
        $this->AnggotaModel = new AnggotaModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_anggota') ? $this->request->getVar('page_anggota') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
        $anggota = $this->AnggotaModel->search($keyword);
        }         
        else
         {
         $anggota = $this->AnggotaModel;
         }

        $data = [
            'title' => 'daftar anggota',
            'active' => 'anggota',
            'anggota'=> $this->AnggotaModel->paginate(6, 'anggota'),
            'pager' => $this->AnggotaModel->pager,
            'currentPage' => $currentPage
        ];
        return view('anggota/index', $data);
    }
    public function hapus($id_anggota)
    {
        $this->AnggotaModel->delete($id_anggota);

        session()->setFlashdata('success', 'Data berhasil di hapus');
        return redirect()->to('/anggota');
    }

    public function edit($id_anggota)
    {
        $data = [
            'title' => 'Edit data anggota',
            'anggota' => $this->AnggotaModel->where(['id_anggota' => $id_anggota])->first(),
            'validate' => session()->get('validate')

        ];
        return view('anggota/edit', $data);
    }
    public function update($id_anggota)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan nama harap diisi"
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan alamat harap diisi"
                ]
            ],
            'nomor' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => "Inputan nomor telepon harap diisi",
                    'integer' => 'Data harus berupa angka'
                ]
            ]

        ])) {
            // $validate = \Config\Services::validation();
            $validate = $this->validator->getErrors();
            return redirect()->to("/anggota/edit/$id_anggota")->withInput()->with('validate', $validate);
        }

        // Update data anggota
        $this->AnggotaModel->update($id_anggota, [
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor' => $this->request->getVar('nomor')
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/anggota');
    }
    public function create()
    {

        $data = [
            'title' => "Tambah Data Anggota",
            'validate' =>  session()->get('validate')

        ];


        return view('/anggota/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan nama harap diisi"
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Inputan alamat harap diisi"
                ]
            ],
            'nomor' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => "Inputan nomor telepon harap diisi",
                    'integer' => 'Data harus berupa angka'
                ]
            ]

        ])) {
            // $validate = \Config\Services::validation();
            $validate = $this->validator->getErrors();
            return redirect()->to('/anggota/create')->withInput()->with('validate', $validate);
        }


        $this->AnggotaModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor' => $this->request->getVar('nomor')
        ]);



        session()->setFlashdata('success', "Data Berhasil di tambahkan");
        return redirect()->to('/anggota');
    }

}


