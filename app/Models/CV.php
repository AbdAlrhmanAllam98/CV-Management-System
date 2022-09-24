<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $table='cvs';
    protected $fillable = [
        'cvName',
        'userEmail',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sections(){
        return $this->hasMany(Section::class,'cvId','id');
    }
}
