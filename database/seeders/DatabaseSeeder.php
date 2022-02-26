<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use App\Models\Category;
use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Eko Setyono Wibowo',
        //     'email' => 'bowo1120@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // id = 1
        // Pegawai::create([
        //     'pembuat' => 'Abraham Lincoln',
        //     'slug' => 'abraham-lincoln'
        // ]);

        // // id = 2
        // Pegawai::create([
        //     'pembuat' => 'Steve Jobs',
        //     'slug' => 'steve-job'
        // ]);

        // // id = 3
        // Pegawai::create([
        //     'pembuat' => 'Eko Setyono Wibowo',
        //     'slug' => 'lilkhoo'
        // ]);

        // // id = 4
        // Pegawai::create([
        //     'pembuat' => 'Adrian Paulin',
        //     'slug' => 'ap'
        // ]);


        User::factory(10)->create();
        // id = 1
        Category::create([
            'name' => 'Makanan',
            'slug' => 'makanan'
        ]);

        // id = 2
        Category::create([
            'name' => 'Minuman',
            'slug' => 'minuman'
        ]);

        // id = 3
        Category::create([
            'name' => 'Popular Foods',
            'slug' => 'popular-foods'
        ]);

        // id = 4
        Category::create([
            'name' => 'Popular Drinks',
            'slug' => 'popular-drinks'
        ]);

        Pegawai::factory(4)->create();

        Menu::factory(20)->create();

        // Menu::create([
        //     'namamenu' => 'Hot Coffee',
        //     'category_id' => 2,
        //     'pegawai_id' => 1,
        //     'slug' => 'hot-coffee',
        //     'harga' => 10000,
        //     'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat labore sapiente quam vel quis vitae quidem nisi itaque dignissimos delectus.',
        //     'ketersediaan' => 10

        // ]);

        // Menu::create([
        //     'namamenu' => 'Nasi Goreng',
        //     'category_id' => 1,
        //     'pegawai_id' => 2,
        //     'slug' => 'nasi-goreng',
        //     'harga' => 10000,
        //     'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat labore sapiente quam vel quis vitae quidem nisi itaque dignissimos delectus.',
        //     'ketersediaan' => 10

        // ]);

        // Menu::create([
        //     'namamenu' => 'Boba Milk Tea',
        //     'category_id' => 4,
        //     'pegawai_id' => 3,
        //     'slug' => 'boba-milk-tea',
        //     'harga' => 10000,
        //     'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat labore sapiente quam vel quis vitae quidem nisi itaque dignissimos delectus.',
        //     'ketersediaan' => 10

        // ]);

        // Menu::create([
        //     'namamenu' => 'Nasi Gila',
        //     'category_id' => 3,
        //     'pegawai_id' => 4,
        //     'slug' => 'nasi-gila',
        //     'harga' => 10000,
        //     'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat labore sapiente quam vel quis vitae quidem nisi itaque dignissimos delectus.',
        //     'ketersediaan' => 10

        // ]);
    }
}
