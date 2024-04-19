<?php
namespace App\Exports;

use App\Models\Inscription;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InscriptionExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Inscription::where('accepte', 'oui')->orWhere('accepte', 'true')->get([
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
