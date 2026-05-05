<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //jika nama tabel tidak susai dengan konvensi
    // maka kita bisa mendefinisikan nama tabel secar eksplisit
    protected $table = 'products';
    //
}
