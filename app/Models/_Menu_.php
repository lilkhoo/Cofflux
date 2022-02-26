<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu
{
    private static $menuDummy = [
        [
            "namamenu" => "Nasi Goreng",
            "slug" => "nasi-goreng",
            "pembuat" => "Reynold Poernomo",
            "desc" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero quasi eveniet vel provident repudiandae eligendi quos enim accusamus ad deleniti? Impedit voluptatum, aliquam praesentium porro a alias id! Nemo animi vel fugiat iusto, reiciendis quisquam suscipit explicabo facere ipsa voluptatem eaque ullam unde eius praesentium aliquid officiis voluptates eum commodi architecto officia error nihil! Officiis eos distinctio commodi aut, alias laboriosam assumenda voluptatum temporibus aperiam optio minus incidunt veritatis sunt?"
        ],
        [
            "namamenu" => "Nasi Goreng Jawa",
            "slug" => "nasi-goreng-jawa",
            "pembuat" => "KhoLilbert",
            "desc" => "aowkoawkkawoawokawkooawkoawokawokawoawkkkkkkkkkkkkkkkkkoawkwaokwaokawkowaokawokwaokwokwaokwaokawkoawkoawkoawokwakoawo"
        ]
    ];

    public static function all()
    {
        return collect(self::$menuDummy);
    }

    public static function find($slug)
    {
        $menus = static::all();

        return $menus->firstWhere('slug', $slug);
    }
}
