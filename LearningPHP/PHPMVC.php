<?php

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}(); // '->' is a scope accessor, this is how we are getting the method within the same page
}

echo $view->output();

// ------------------------------------------- The Model
class Model
{
    public $string;

    public function __construct(){
        $this->string = 'MVC + PHP = Awesome, click here!';
    }
}

// ------------------------------------------- The View
class View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        return '<p><a href="phpmvc.php? action=clicked">' . $this->model->string . "</a></p>"; // <-- action clicked - calls the clicked() function in controller
    }
}

// ------------------------------------------- The Controller
class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clicked() { // <-- action clicked!
        $this->model->string = 'Updated Data, thanks to MVC and PHP!';
    }
}

?>