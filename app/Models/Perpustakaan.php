<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perpustakaans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'alamat', 'no_telpon', 'tipe', 'latitude', 'longitude'
    ];
}