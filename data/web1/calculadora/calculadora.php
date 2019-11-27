<?php
//index.php
class App
{
    public function __construct()
    {
        session_start();
    }
   

    
    public function calculadora(){
        $operando1 = $_GET['operando1'];
        $operando2 = $_GET['operando2'];
        $operador = $_GET['operador'];
        $mensaje =null;
        if(!is_numeric($operando1) || !is_numeric($operando2)){
            
            $_SESSION['operador1'] = $operando1;
            $_SESSION['operador2'] = $operando2;
            $_SESSION['operador'] = $operador;
            if(!is_numeric($operando1) && is_numeric($operando2)){
                $mensaje = 'El primer operador no es un numero';
            }
            if(is_numeric($operando1) && !is_numeric($operando2)){
                $mensaje = 'El segundo operador no es un numero ';
            }
            if(!is_numeric($operando1) && !is_numeric($operando2)){
                $mensaje = 'Ninguno de los dos operadores son un numero';
            }
            $_SESSION['mensaje'] = $mensaje;
            echo $_SESSION['mensaje'];
        }
        
            if($operador == "+"){
                $solucion = $operando1 + $operando2;
            }else if($operador == "-"){
                $solucion = $operando1 - $operando2;
            }else if($operador == "*"){
                $solucion = $operando1 * $operando2;
            }else if($operador == "/"){
                $solucion = $operando1 / $operando2;
            }
            echo "La solución es: ".$solucion;
           unset($_SESSION);
        
        require('vista.php');
      
    }
}
$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'calculadora';
}

$app->$method();

