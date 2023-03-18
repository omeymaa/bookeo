<?php

namespace App\Controller;

class PageController extends Controller {
    public function route(): void {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'about':
                        // On appelle la méthode about()
                        $this->about();
                        break;
                    case 'home':
                        // appeler la méthode home
                        $this->home();
                        break;
                    default:
                        // erreur
                        throw new \Exception('Cette action n\'existe pas : '.$_GET['action']);
                        break;
                }
               } else {
                // genere une erreur si pas d'action
                throw new \Exception('Aucune action detectée');
               }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
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

     protected function home() 
     {
        $this->render('page/home', [

        ]);
     }
}

?>