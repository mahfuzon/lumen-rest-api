<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{
protected $table = "produk";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'harga', 'warna', 'kondisi', 'deskripsi'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
