<?php

try {

    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(
        array(
            '../app/controllers/',
            '../app/models/'
        )
    )->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    //Set the database service
    $di->set('db', function(){
        $services = json_decode($_ENV['VCAP_SERVICES'], true);
        $service = $services['cleardb'][0]; // pick the first service
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => $service['credentials']['hostname'],
            "port" => $service['credentials']['port'],
            "username" => $service['credentials']['username'],
            "password" => $service['credentials']['password'],
            "dbname" => $service['credentials']['name']
        ));
    });

    //Setting up the view component
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application();
    $application->setDI($di);
    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}
