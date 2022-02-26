<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['category', 'pegawai'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('namamenu', 'like', '%' . $filters['search'] . '%')->orWhere('deskripsi', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('namamenu', 'like', '%' . $search . '%')->orWhere('deskripsi', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });


        $query->when(
            $filters['pegawai'] ?? false,
            fn ($query, $pegawai) =>
            $query->whereHas(
                'pegawai',
                fn ($query) =>
                $query->where('username', $pegawai)
            )
        );
    }



    public function transaksis()
    {
        return $this->hasMany(transaksi::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    // Function Untuk Mengubah Nilai Default Route Model Binding Dari 'id' Menjadi 'slug'
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namamenu'
            ]
        ];
    }
}
