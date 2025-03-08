<?php

namespace App\Exports;

use App\Models\Inscription;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllInscriptionExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Inscription::all([
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
            'accepte',
        ]);
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Prénom',
            'Profession',
            'Nationalité',
            'Date de naissance',
            'Genre',
            'Email',
            'Téléphone',
            'Région',
            'Préfecture',
            'Localité',
            'Motivation',
            'Expérience',
            'Attentes',
            'Contribution',
            'Accepté'
        ];
    }
}
