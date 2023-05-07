<?php

namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        // Récupération du chemin complet de la classe, commençant par 'App'
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);

        // Remplacement des \ pars des /
        $class = str_replace('\\', '/', $class);

        // Isolation du nom du fichier
        $fichier = __DIR__ . '/' . $class . '.php';

        // On vérifie que le fichier existe
        if (file_exists($fichier)) {
            require_once $fichier;
        }
    }
}
