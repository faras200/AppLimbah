<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    use HasFactory;
    protected $table = 'penjemputan';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
}
