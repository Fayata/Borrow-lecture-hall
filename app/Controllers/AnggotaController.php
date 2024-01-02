<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\RoomModel;
use App\Models\BookingModel;


class AnggotaController extends Controller
{
    public function index()
    {
        return view('anggota/dashboard');
    }

    public function room()
    {
        $roomModel = new RoomModel();
        $data['rooms'] = $roomModel->getRoomAnggota();

        return view('anggota/room/index', $data);
    }

    public function RegistrationForm($id)
    {
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->find($id);

        return view('anggota/room/register_booking', $data);
    }

    public function storeBooking()
    {
        // Memeriksa apakah pengguna sudah login sebagai member
        if (!session()->has('anggota')) {
            return redirect()->to('/');
        }

        // Dapatkan data user_id dari sesi anggota
        $user_id = session('user')['id'];

        // Mengambil data dari formulir
        $date_request = $this->request->getPost('date_request');
        $start_time = $this->request->getPost('start_time');
        $end_time = $this->request->getPost('end_time');
        $room_id = $this->request->getPost('room_id');
        $tujuan = $this->request->getPost('tujuan');
        $no_wa = $this->request->getPost('no_wa');

        // Memasukkan permintaan peminjaman ke dalam database
        $bookingModel = new BookingModel();
        $status = "pending";
        $data = [
            'user_id' => $user_id,
            'room_id' => $room_id,
            'date_request' => $date_request,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'tujuan' => $tujuan,
            'status' => $status,
            'no_wa' => $no_wa
        ];

        $roomModel = new RoomModel();

        // Mengupdate status kamar menjadi 'pending'
        $updateDataRoom = [
            'status' => 'pending'
        ];

        $roomModel->update($room_id, $updateDataRoom);

        // Menyimpan data pemesanan ke dalam database
        $bookingModel->insert($data);

        return redirect()->to('AnggotaController/booking')->with('success', 'Reservasi Berhasil! Silahkan Tunggu Konfirmasi dari Admin.');
    }


    public function booking()
    {
        $roomModel = new RoomModel();
        $data['rooms'] = $roomModel->getNonFreeRooms();

        return view('anggota/room/booking', $data);
    }

    public function checkout($id)
    {
        $roomModel = new RoomModel();

        $updateDataRoom = [
            'status' => 'free'
        ];

        if ($roomModel->update($id, $updateDataRoom)) {
            return redirect()->to('AnggotaController/booking')->with('success', 'Berhasil checkout.');
        } else {
            return redirect()->to('AnggotaController/booking')->with('error', 'Gagal checkout.');
        }
    }

    public function history()
    {
        $bookingModel = new BookingModel();

        $id = session('user')['id'];

        $bookings = $bookingModel->getApprovedBookingsAnggota($id);

        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data = [
            'bookings' => $bookings,
            'users' => $users
        ];

        return view('anggota/room/history', $data);
    }
}
