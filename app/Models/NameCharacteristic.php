<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class NameCharacteristic extends Model
{
    use HasFactory;
    protected $table = 'name_characteristic';
    protected $guarded = false;
    protected $fillable = ['name', 'name_en'];

    public function setAttribute($key, $value)
    {
        if ($key == 'name') {
            $this->attributes['name_en'] = Str::slug($value, '_');
        }

        parent::setAttribute($key, $value);
    }

    public function characteristic()
    {
        return $this->hasMany(Characteristic::class,'id_name_char','id');
    }
}
