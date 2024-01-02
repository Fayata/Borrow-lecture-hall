<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'room_id', 'date_request', 'start_time', 'end_time', 'tujuan', 'status', 'no_wa'];

    public function getBookings()
    {
        $db = db_connect();

        $query = $db->table($this->table)
            ->select($this->table . '.*, rooms.ruangan, rooms.kapasitas, rooms.fasilitas, rooms.image, users.nama')
            ->join('rooms', 'rooms.id = ' . $this->table . '.room_id', 'left')
            ->join('users', 'users.id = ' . $this->table . '.user_id', 'left')
            ->where($this->table . '.status', 'pending')
            ->get();

        return $query->getResultArray();
    }


    public function getBookingsForNotification()
    {
        return $this->where('is_notified', 0)->findAll();
    }

    // Fungsi untuk memperbarui status notifikasi peminjaman ruangan
    public function markAsNotified($bookingId)
    {
        $this->update($bookingId, ['is_notified' => 1]);
    }

    public function getApprovedBookings()
    {
        $db = db_connect();

        $query = $db->table($this->table)
            ->select($this->table . '.*, rooms.ruangan, rooms.kapasitas, rooms.fasilitas, rooms.image, users.nama')
            ->join('rooms', 'rooms.id = ' . $this->table . '.room_id', 'left')
            ->join('users', 'users.id = ' . $this->table . '.user_id', 'left')
            ->where($this->table . '.status', 'approved')
            ->get();

        return $query->getResultArray();
    }

    public function getApprovedBookingsAnggota($id)
    {
        $db = db_connect();

        $query = $db->table($this->table)
            ->select($this->table . '.*, rooms.ruangan, rooms.kapasitas, rooms.fasilitas, rooms.image, users.nama')
            ->join('rooms', 'rooms.id = ' . $this->table . '.room_id', 'left')
            ->join('users', 'users.id = ' . $this->table . '.user_id', 'left')
            ->where($this->table . '.status', 'approved')
            ->where($this->table . '.user_id', $id) // Menambahkan kondisi untuk memfilter berdasarkan ID pengguna
            ->get();

        return $query->getResultArray();
    }
}
