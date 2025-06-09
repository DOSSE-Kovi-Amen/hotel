<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct()
    {
        view()->composer('*', function ($view) {
            // Récupérer les articles du panier

            // Calculer le total du panier

            // Compter le nombre d'articles dans le panier


            $view->with([
                'rooms' => Room::all(),
            ]);
        });
    }
}
