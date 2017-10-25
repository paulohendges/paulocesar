<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'phendges',
        'password'    => 'BjZ96a{OG.{t',
        'dbname'      => 'paulocesarweb',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri'        => @preg_replace('/public([\/\\\\])/../', '', $_SERVER["PHP_SELF"]),
    ],
    'email' => [
        'IsSMTP' => true,
        'Host' => 'smtp.gmail.com',
        'Username' => 'paulo.hendges@gmail.com',
        'Port' => '465',
        'SMTPSecure' => 'tls',
        'SMTPAuth' => true,
        'Password' => '@Juninhendges1508',
        'From' => 'paulo.hendges@gmail.com',
    ]
]);
