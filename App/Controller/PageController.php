<?php

namespace App\Controller;

class PageController extends Controller {
    public function route(): void {

        if (isset($_GET['action'])) {
         switch ($_GET['action']) {
             case 'about':
                 // On appelle la méthode about()
                 $this->about();
                 break;
             case 'home':
                 // appeler la méthode home
                 var_dump('On appelle la méthode home');
                 break;
             default:
                 // erreur
                 break;
         }
        } else {
         // charger la page d'accueil
        }
     }

     protected function about() 
     {
        /* on passe en premier paramètre la page à charger
        et en deuxième un tableau associatif de paramètres */
        $this->render('page/about', [
            'test' => 'abc',
            'test2' => 'abc2',
        ]);
     }
}

?>