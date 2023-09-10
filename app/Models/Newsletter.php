<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Newsletter extends Model
{
    protected $fillable = ['email'];

    public static $rules = [
        'email' => 'required|email', // Utilisez la règle 'email' pour valider le champ email.
        // Autres règles de validation...
    ];
}
