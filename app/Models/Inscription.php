<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Inscription extends Model
{
    // Dans app/Models/Utilisateur.php

    protected $fillable = [
        'nom',
        'prenom',
        'profession',
        'nationalite',
        'naissance',
        'genre',
        'email',
        'telephone',
        'region',
        'prefecture',
        'localite',
        'motivation',
        'experience',
        'attentes',
        'contribution',
        'activity_id'
    ];

}
