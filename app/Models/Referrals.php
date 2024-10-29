<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referrals extends Model
{
    protected $fillable=[
        'name',
        'count',
    ];
    public $timestamps=false;

}
