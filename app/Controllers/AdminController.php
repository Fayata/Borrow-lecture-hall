<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\RoomModel;
use App\Models\BookingModel;


class AdminController extends Controller
{
    public function index()
    {
        // Tampilkan halaman dashboard admin
        return view('admin/dashboard');
    }

    ///////////////////////////////////////
    ////// bagian crud akun admin ////////
    /////////////////////////////////////

    public function admin()
    {
        $userModel = new UserModel();

        $admin = $userModel->where('role', 'admin')->findAll();

        return view('admin/admin/index', ['admin' => $admin]);
    }

    public function create()
    {
        return view('admin/admin/add_admin');
    }

    public function store()
    {
        $adminModel = new UserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nohp'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'admin',
            'status_akun' => 'aktif'
        ];
        $adminModel->addUser($data);

        if ($adminModel->db->affectedRows() > 0) {
            // Jika berhasil, set pesan sukses menggunakan flash session
            return redirect()->to('/AdminController/admin')->with('success', 'Data berhasil Disimpan');
        }
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['admin'] = $userModel->find($id);

        return view('admin/admin/edit_admin', $data);
    }

    public function update($id)
    {
        $adminModel = new UserModel();

        // Ambil data yang akan diupdate dari form
        $adminData = [
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nohp')
        ];

        // Periksa apakah password diinput
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            // Jika password diinput, hash password baru
            $adminData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Lakukan update sesuai dengan admin_id
        $adminModel->update(['admin_id' => $id], $adminData);

        return redirect()->to('/AdminController/admin')->with('success', 'Admin berhasil diupdate');
    }


    public function delete($id)
    {
        $adminModel = new UserModel();
        $adminModel->delete($id);

        return redirect()->to('/AdminController/admin')->with('delete', 'Admin berhasil dihapus');
    }


    ////////////////////////////////////////
    ////// bagian crud akun member ////////
    //////////////////////////////////////

    public function anggota()
    {
        $userModel = new UserModel();

        $anggota = $userModel->where('role', 'anggota')->findAll();

        return view('admin/anggota/index', ['anggota' => $anggota]);
    }

    public function createAnggota()
    {
        return view('admin/anggota/add_anggota');
    }

    public function storeAnggota()
    {
        $anggotaModel = new UserModel();
        // Tentukan status_akun berdasarkan peran (role)
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nohp'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'anggota',
            'status_akun' => 'nonaktif'
        ];

        $anggotaModel->addUser($data);

        if ($anggotaModel->db->affectedRows() > 0) {
            // Jika berhasil, set pesan sukses menggunakan flash session
            return redirect()->to('/AdminController/anggota')->with('success', 'Data berhasil Disimpan');
        }
    }


    public function editAnggota($id)
    {
        $userModel = new UserModel();
        $data['member'] = $userModel->find($id);

        return view('admin/anggota/edit_anggota', $data);
    }

    public function updateAnggota($id)
    {
        $anggotaModel = new UserModel();

        // Ambil data yang akan diupdate dari form
        $anggotaData = [
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nohp')
        ];

        // Periksa apakah password diinput
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            // Jika password diinput, hash password baru
            $anggotaData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Lakukan update sesuai dengan admin_id
        $anggotaModel->update(['member_id' => $id], $anggotaData);

        return redirect()->to('/AdminController/anggota')->with('success', 'Member berhasil diupdate');
    }


    public function deleteAnggota($id)
    {
        $anggotaModel = new UserModel();
        $anggotaModel->delete($id);

        return redirect()->to('/AdminController/anggota')->with('delete', 'Member berhasil dihapus');
    }


    public function aktifkanAnggota($id)
    {
        $userModel = new UserModel();
        $userModel->activateUser($id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/AdminController/anggota')->with('success', 'Akun berhasil diaktifkan');
    }

    public function nonaktifkanAnggota($id)
    {
        $userModel = new UserModel();
        $userModel->deactivateUser($id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/AdminController/anggota')->with('success', 'Akun berhasil dinonaktifkan');
    }

    ///////////////////////////////////
    ////// bagian crud gedung ////////
    /////////////////////////////////

    public function room()
    {
        $roomModel = new RoomModel();
        $data['rooms'] = $roomModel->getRooms();

        return view('admin/room/index', $data);
    }

    public function createRoom()
    {
        return view('admin/room/add_ruangan');
    }

    public function storeRoom()
    {
        $ruangan = $this->request->getPost('ruangan');
        $kapasitas = $this->request->getPost('kapasitas');
        $fasilitas = $this->request->getPost('fasilitas');

        // Mengelola file gambar yang diunggah
        $image = $this->request->getFile('image');
        $image_name = $image->getRandomName();
        $image->move('assets/image/ruangan/', $image_name);

        // Menyimpan data ke dalam database
        $roomModel = new RoomModel();
        $data = [
            'ruangan' => $ruangan,
            'kapasitas' => $kapasitas,
            'fasilitas' => $fasilitas,
            'image' => $image_name
        ];
        $roomModel->insert($data);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/AdminController/room')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    public function editRoom($id)
    {
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getRoom($id);

        return view('admin/room/edit_ruangan', $data);
    }

    public function updateRoom($id)
    {
        $roomModel = new RoomModel();
        $data = [
            'ruangan' => $this->request->getPost('ruangan'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'fasilitas' => $this->request->getPost('fasilitas')
        ];

        // Cek apakah ada file gambar yang diunggah
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Pindahkan file gambar ke direktori yang diinginkan (misalnya: public/uploads)
            $newName = $image->getRandomName();
            $image->move('assets/image/ruangan/', $newName);

            // Simpan nama file gambar ke dalam array data
            $data['image'] = $newName;
        }

        $roomModel->updateRoom($id, $data);

        if ($roomModel->db->affectedRows() > 0) {
            // Jika berhasil, set notifikasi berhasil menggunakan flash session
            session()->setFlashdata('success', 'Data ruangan berhasil diupdate.');
        }

        return redirect()->to('AdminController/room');
    }


    public function deleteRoom($id)
    {
        $roomModel = new RoomModel();

        $room = $roomModel->find($id);

        if ($room) {
            if (!empty($room['image'])) {
                $imagePath = 'assets/image/ruangan/' . $room['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $roomModel->deleteRoom($id);

            if ($roomModel->db->affectedRows() > 0) {
                session()->setFlashdata('success', 'Data ruangan berhasil dihapus.');
            }
        } else {
            session()->setFlashdata('error', 'Data ruangan tidak ditemukan.');
        }

        return redirect()->to('AdminController/room');
    }


    public function booking()
    {
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->getBookings();

        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data = [
            'bookings' => $bookings,
            'users' => $users
        ];

        return view('admin/booking/index', $data);
    }

    public function updateStatus($id, $newStatus)
    {
        if (!session()->has('admin')) {
            return redirect()->to('/');
        }

        // Memperbarui status peminjaman
        $bookingModel = new BookingModel();
        $booking = $bookingModel->find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

        $booking['status'] = $newStatus;
        $bookingModel->update($id, $booking);

        // Memperbarui status ruangan jika status booking diubah menjadi 'approved'
        if ($newStatus === 'approved') {
            $roomModel = new RoomModel();
            $room_id = $booking['room_id'];

            $data = [
                'status' => 'booked'
            ];

            $roomModel->update($room_id, $data);
        }

        $message = '';
        if ($newStatus === 'approved') {
            $message = 'Surat Peminjangan Ruangan telah diapprove, silahkan unduh surat peminjaman berikut: (link docs)';
        } elseif ($newStatus === 'rejected') {
            $message = 'Surat Peminjangan Ruangan telah ditolak dikarenakan (alasan). Silahkan lakukan kembali peminjaman ruangan dengan benar dan sesuai.';
        }

        $whatsappURL = 'https://wa.me/' . $booking['no_wa'] . '?text=' . urlencode($message);
        return redirect()->to($whatsappURL);
    }

    public function history()
    {
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->getApprovedBookings();

        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data = [
            'bookings' => $bookings,
            'users' => $users
        ];

        return view('admin/booking/history', $data);
    }
}
