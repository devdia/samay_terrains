<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordonate extends Model
{
    public function terrain() {
        return $this->hasOne(Terrain::class);
    }
}
