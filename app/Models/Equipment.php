<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table='equipments';
    protected $fillable = [
        'name',
        'type',
        'model'
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class,'equipment_id','id');
    }

    


}
