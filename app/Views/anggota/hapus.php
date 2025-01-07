public function hapus($id_anggota)
{
    if ($this->AnggotaModel->delete($id_anggota)) {
        session()->setFlashdata('success', 'Data anggota berhasil dihapus');
    } else {
        session()->setFlashdata('error', 'Data anggota tidak ditemukan');
    }
    return redirect()->to('/anggota');
}


