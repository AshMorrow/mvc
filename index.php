<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('VIEW_DIR', ROOT . 'View' . DS);
define('LIB_DIR', ROOT . 'Library' . DS);
define('CONTROLLER_DIR', ROOT . 'Controller' . DS);
define('MODEL_DIR', ROOT . 'Model' . DS);
define('DATA_DIR', ROOT . '_data' . DS);

function __autoload($c_name)
{
    $file = "{$c_name}.php";
    if (file_exists(LIB_DIR . $file)) {
        require LIB_DIR . $file;
    }elseif (file_exists(CONTROLLER_DIR . $file)) {
        require CONTROLLER_DIR . $file;
    }elseif (file_exists(MODEL_DIR . $file)) {
        require MODEL_DIR . $file;
    } else {
        throw new Exception("{$file} not found");
    }
}
try {
    Session::start();
    $request = new Request();
    $route = $request->get('route');
    if (is_null($route)) {
        $route = "index/index";
    }
    $route = explode('/', $route);

    $controller = ucfirst(strtolower($route[0])) . 'Controller';  //Like book =>> BookController
    $action = $route[1] . 'Action';
    $controller = new $controller();

    if (!method_exists($controller, $action)) {
        throw new Exception("{$action} not found");
    }
    $content = $controller->$action($request);
}catch(Exception $e){
    $content = Controller::renderError($e->getCode(),$e->getMessage());
}





require VIEW_DIR . 'default_layout.phtml';
var_dump($route,$controller,$action);
var_dump($_SERVER['REQUEST_URI']);
echo session_save_path();