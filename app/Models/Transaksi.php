<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $guarded = ['id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function pegawai()
    // {
    //     return $this->belongsTo(Pegawai::class);
    // }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['tgl_transaksi'] ?? false, function ($query, $tgl_transaksi) {
            return $query->whereDate('tgl_transaksi', $tgl_transaksi);
        });
    }
}
