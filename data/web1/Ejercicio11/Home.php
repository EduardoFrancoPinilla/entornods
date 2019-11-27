<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Home</h1>
    <h4>Ya estás logueado <?php echo $_SESSION['name'] ?>!!</h4>

    <h1>Nuevos deseos</h1>
    <div>
        <form action="/Ejercicio11/Ejercicio11.php?method=new" method="post">
        <div>
            <label for="wish">Nuevo deseo</label>
            <input type="text" name="wish">
        </div>
        <div>
            <input type="submit">
        </div>
        </form>
    </div>

    <h1>Lista de deseos</h1>

    <?php 
    if (isset($_SESSION['wishes'])) {
        $wishes = $_SESSION['wishes'];
        echo "<ul>";
        foreach ($wishes as $key => $wish) {
            echo '<li>' 
            . $wish 
            . ' - <a href="'
            . "?method=delete&key=$key"
            . '">borrar</a>'
            . '</li>';
        } 
        echo "</ul>";
        echo '<a href="?method=empty">Vaciar lista</a>';
    } else {
        echo "<h4>Lista vacía</h4>";
    }
    ?>
</body>
</html>