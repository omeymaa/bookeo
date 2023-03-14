<?php

namespace App\Controller;

Class Controller {
    public function route(): void {
       if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
            case 'page':
                // charger controleur page
                var_dump('On charge PageController');
                break;
            case 'book':
                // charger controleur book
                var_dump('On charge BookController');
                break;
            default:
                // erreur
                break;
        }
       } else {
        // charger la page d'accueil
       }
    }
}