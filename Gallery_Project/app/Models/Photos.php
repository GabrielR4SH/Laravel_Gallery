<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $table = 'photos';

    protected $fillable = ['image', 'title', 'description'];

    public function getUrlAttribute()
    {
        return asset('storage/images/' . $this->image);
    }

}
