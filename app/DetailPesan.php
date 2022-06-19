<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesan extends Model
{
    protected $table = "detail_pesan";
    public $timestamps = false;
    protected $fillable=['no_pesan', 'kd_brg', 'qty_pesan', 'subtotal'];
}
