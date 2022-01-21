<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public $table = "bukus";
    protected $fillable = [
        'judul', 'pengarang',
    ];
}
