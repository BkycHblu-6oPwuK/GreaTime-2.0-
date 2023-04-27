<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameCharacteristic extends Model
{
    use HasFactory;
    protected $table = 'name_characteristic';
    protected $guarded = false;
}
