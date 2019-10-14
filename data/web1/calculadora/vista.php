<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

  
    <title>Document</title>
</head>
<body>
    <h1>Introduzca los numeros que desea sumar.</h1>
    <form method="get" action="calculadora.php?method=calculadora">
		<input type="text" name="operando1" value="<?php echo (isset($_SESSION['operador1'] ))? $_SESSION['operador1']:"" ;  ?> ">
		<select name="operador">
			<option value="+">+
			</option>
			<option value="-">-
			</option>
			<option value="*">*
			</option>
			<option value="/">/
			</option>
		</select>
		<input type="text" name="operando2" value="<?php echo (isset($_SESSION['operador2'] ))? $_SESSION['operador2']:"" ;  ?>">
		<input type="submit" value="enviar">
	</form>
        
        </form>
    </div>
</body>
</html>