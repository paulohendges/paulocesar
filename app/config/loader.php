<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();

$loader->registerNamespaces(
    array(
       "Model" => $config->application->modelsDir,
        "Db" => $config->application->libraryDir.'/db',
        "App" => $config->application->libraryDir.'/app',
        "PHPMailer" => $config->application->libraryDir.'/phpmailer/src',
    )
)->register();