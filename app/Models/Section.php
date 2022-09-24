<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'sectionTitle',
        'cvId',
    ];

    public function cv(){
        return $this->belongsTo(CV::class,'cvId','id');
    }
}
