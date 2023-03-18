<?php

namespace App\Controller;

use App\Repository\BookRepository;

class BookController extends Controller {
    public function route(): void {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                        break;
                    case 'list':
                        // appeler méthode list()
                        break;
                    case 'edit':
                        // appeler méthode edit()
                        break;
                    case 'add':
                        // appeler méthode add()
                        break;
                    case 'delete':
                        // appeler méthode delete()
                        break;
                    case 'delete':
                        // appeler méthode delete()
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

     protected function show() 
     {
        try {
            if (isset($_GET['id'])) {

                $id = (int)$_GET['id'];
                // charger le livre par un appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);

                $this->render('book/show', [
                    'book' => $book,
                ]);
            } else {
                throw new \Exception('L\'id est manquant en parametre');
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }


     }

}

?>