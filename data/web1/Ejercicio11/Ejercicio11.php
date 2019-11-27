<?php
//index.php
class App
{
    public function __construct()
    {
        session_start();
    }
    public function login()
    {
        // echo "en login";
        if (isset($_SESSION['name'])) {
            header('Location: /Ejercicio11/Ejercicio11.php?method=home');
        } else {
            require('Login.php');
        }
    }
    public function auth()
    {
        // echo "en auth";
        // var_dump($_POST);
        // echo "<br>";
        // var_dump($_GET);
        // echo "<br>";
        // var_dump($_COOKIE);
        // return;
        if (empty($_POST['name'])) {
            header('Location: /Ejercicio11/Ejercicio11.php?method=login');
        } else {
            $_SESSION['name'] = $_POST['name'];
            header('Location: /Ejercicio11/Ejercicio11.php?method=home');
        }
        //tomar nombre, y meter en sesión
        //reenviar a home
        //header('Location: /index.php?method=home');
    }
    public function home()
    {
        echo "en home";
        require('Home.php');
    }
    public function empty(Type $var = null)
    {
        unset($_SESSION['wishes']);
        header('Location: ?method=home');
    }
    public function new()
    {
        //SOLUCION 1:
        if (isset($_POST['wish'])) {
            $_SESSION['wishes'][] = $_POST['wish'];
        }
        header('Location: ?method=home');
        return;
        // //SOLUCION 2:
        // if (isset($_SESSION['wishes'])) {
        //     $wishes = $_SESSION['wishes'];
        // } else {
        //     $wishes = array();
        // }
        // if (isset($_POST['wish'])) {
        //     $wishes[] = $_POST['wish'];
        //     $_SESSION['wishes'] = $wishes;
        // }
        // header('Location: ?method=home');
    }
    public function delete()
    {
        if (isset($_GET['key'])) {
            $key = $_GET['key'];
            unset($_SESSION['wishes'][$key]);
            header('Location: ?method=home');
        }
    }
}
$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'login';
}
// $method = .....
$app->$method();
//<form action="?method=auth" method="post"></form>