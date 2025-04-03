<?php

use api\requestResolver;

require 'config/config.php';
require 'api/requestResolver.php';

$request = new requestResolver();

if (isset($_POST['login'])) {
    $uData   = $request->login($_POST);

    if (array_key_exists('users', $uData)) {
        $_SESSION['loggedUser'] = [
                'name'       => $uData['users'][0]['firstName'].' '.$uData['users'][0]['lastName'],
                'username'   => $uData['users'][0]['username'],
                'uid'        => $uData['users'][0]['userId'],
                'accountId'  => $uData['users'][0]['accountId'],
                'customerId' => $uData['users'][0]['customerId'],
        ];
        $view = 'mainList';
    } else {
        session_destroy();
        header('Location:/');
    }
}

if (isset($_POST['add'])) {
    $process = new processData();
    $new     = $process->addProduct($_POST);

    if ($new) {
        header('Location:/');
    }
}

if (empty($_SESSION['loggedUser'])) {
    require_once WEBSITE . 'login.php';
} else {
    $view  = 'mainList';
    $route = ltrim($_SERVER['REQUEST_URI'], '/');

    if ($route == 'messenger') {
        //
    } else if ($route == 'diagnostics') {
        //
    } else if ($route == 'search') {
        print_r($request->getKoreUsers());
    } else if ($route == 'jasper_search') {
        print_r($request->jasperDevice('89610185003528552607', $_SESSION['loggedUser']['username']));
    } else if ($route == 'logout') {
        session_destroy();
        header('Location:/');
    }

    require_once WEBSITE . $view.'.php';
}