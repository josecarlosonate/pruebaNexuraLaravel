<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'nombre', 'email','sexo','boletin','descripcion'];
    // protected $guarded = ['id'];
    public $timestamps = false;

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
