<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    public function coordonate() {
        return $this->belongsTo(Coordonate::class);
    }

    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function titre(){
        return $this->belongsTo(Titre::class);
    }

    public function ressources(){
        return $this->hasMany(Ressource::class);
    }

    public function vente() {
        return $this->hasOne(Vente::class);
    }
}
