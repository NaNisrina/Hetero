<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa //extends model
{
    private static $db_siswa = [
        [
            'title' => "Data Siswa",
            'slug'  => "data-siswa",
            'body'  => "1"
        ]
    ];

    public static function all(){
        return collect(self::$db_siswa);
    }
    
}
