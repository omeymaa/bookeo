<?php

namespace App\Controller;

Class Controller {
    public function route(): void 
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        // charger controleur page
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'book':
                        // charger controleur book
                        $BookController = new BookController();
                        $BookController->route();
                        break;
                    default:
                        throw new \Exception('Le controller n\'existe pas');
                        break;
                }
               } else {
                // chargement de la page d'accueil si pas de controller dans l'url
                $pageController = new PageController();
                $pageController->home();
               }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function render(string $path, array $params = []):void
    {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        try {
            if (!file_exists($filePath)) {
                throw new \Exception('Fichier non trouvé :'.$filePath);
            } else {
                // extrait chaque ligne du tableau et crée des variables pour chacune
                extract($params);
                require_once $filePath;
            }
        } catch(\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }



        // require_once _ROOTPATH_.'/templates/page/about.php';
    }
}