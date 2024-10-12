<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 2 HTML - Carlos Sáez</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        td {
            border: 2px solid green;
            padding: 10px;
            text-align: center;
            width: 20px;
        }
        a:hover {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <h1>PHP 2 HTML - Carlos Sáez</h1>
    <ul>
    <?php
        /**
        * Genera un menú de navegación basado en números de secciones.
        *
        * Se crea un menú de 5 secciones. Cada sección tiene un enlace anclado a su respectiva sección en el documento.
        * 
        * @author Kimo
        * @version 1.0
        */

        for ($i = 1 ; $i<=5; $i++){ // Creamos el menú
            echo '<li><a href="#sec'.$i.'">Section '.$i.'</a></li>';
        }
        echo "</ul>";


        /**
         * PAR O IMPAR
         * 
         * Genera un número aleatorio y determina si es par o impar.
         * Se genera un número aleatorio entre -100 y 100, luego se comprueba si es par o impar.
         *
         * @return void
         */

        echo '<article id="sec1"><br/><h1>1. Par o Impar</h1>';
        $number = rand(-100, 100);
        $even = "par";
        if ($number%2 != 0) {
            $even = "impar";
        }
        echo "<p>El número aleatorio es <b>". $number . "</b> y es <b>". $even . "</b></p></article>";


        /**
         * ARCOIRIS
         * Genera un color aleatorio del arcoiris.
         *
         * Se genera un número aleatorio entre 1 y 7, donde cada número representa un color del arcoiris.
         * Muestra el color correspondiente junto a su valor hexadecimal en un artículo HTML.
         *
         * @return void
         */
        
        echo '<article id="sec2"><br/><h1>2. Arcoiris</h1>';
        $number = rand(1, 7);
        switch($number){
            case 1:
                $color = "rojo";
                $hex = "#FF0000";
                break;
            case 2:
                $color = "naranja";
                $hex = "#FFA500";
                break;
            case 3:
                $color = "amarillo";
                $hex = "#FFFF00";
                break;
            case 4:
                $color = "verde";
                $hex = "#008000";
                break;
            case 5:
                $color = "añil";
                $hex = "#4B0082";
                break;
            case 6:
                $color = "azul";
                $hex = "#0000FF";
                break;
            case 7:
                $color = "violeta";
                $hex = "#EE82EE";
                break;
            
        }
        echo '<span>Se ha elegido como color aleatorio el <b>'. $color . '</b> <span style="display:inline-block; height:25px; width:25px; background-color:'.$hex.'"></span></span></article>';


        /**
         * ESTACIONES
         * Genera una fecha aleatoria y determina la estación del año correspondiente.
         *
         * Se elige una fecha aleatoria entre 2024 y 2050, y se determina en qué estación cae esa fecha (primavera, verano, otoño o invierno).
         * La información se muestra en un artículo HTML.
         *
         * @return void
         */

        $num = rand(strtotime("2024-01-01"), strtotime("2050-12-31")); // Elegimos un timestamp de una fecha entre esas dos (¡para que no aparezca una fecha de dentro de 12 milenios!)
        $seasonDate = date("d / m / Y", $num); // se pasa el timestamp a formato fecha
 
        $year = date("Y", $num); // se saca el año del timestamp aleatorio

        $iniSpring = strtotime($year."-03-21");          // Inicio de la Primavera
        $iniSummer = strtotime($year."-06-21");             // Inicio de la Verano
        $iniAutumn = strtotime($year."-09-23");              // Inicio de la Otoño
        $iniWinter = strtotime($year."-12-22");           // Inicio de la Invierno

        if ($num >= $iniSpring && $num < $iniSummer) {  // Si el timestamp está en el rango del inicio de la primavera y el inicio del verano, es Primavera
            $season = "primavera 🌸";
        } else if ($num >= $iniSummer && $num < $iniAutumn) {
            $season = "verano 🌞";
        } else if ($num >= $iniAutumn && $num < $iniWinter) {
            $season = "otoño 🍂";
        } else if ($num >= $iniWinter || $num < $iniSpring) { // El rango incluye el Invierno actual y el Invierno empezado el año anterior. También se podría eliminar la condicion y poner solo un Else, ya que no hay más posibilidades, pero me parece más claro asi (y evitamos posibles errores si los otros rangos no fueran correctos).
            $season = "invierno ❄️";
        } else {
            $season = "Algo ha fallado"; // Esto no debería salir en ningun momento, pero por si acaso...
        }
        
        echo '<article id="sec3"><br/><h1>3. Estaciones</h1><p>La fecha aleatoria es el dia <b>'.$seasonDate.'</b> y cae en <b>'.$season.'</b></p></article>';


        /**
         * TABLA
         * Genera una tabla de multiplicar basada en una fecha aleatoria.
         *
         * Se genera una fecha aleatoria, se extraen el día y el mes, y se crean filas y columnas basadas en el valor del mes y el día.
         * Muestra una tabla de multiplicar que refleja las combinaciones entre ambos valores.
         *
         * @return void
         */

        echo '<article id="sec4"><br/><h1>4. Tabla</h1>';

        $num = rand(strtotime("2024-01-01"), strtotime("2050-12-31")); // Elegimos un timestamp de una fecha entre esas dos (¡para que no aparezca una fecha de dentro de 12 milenios!)
        $seasonDate = date("d / m / Y", $num); // se pasa el timestamp a formato fecha
 
        $month = date("m", $num);
        $day = date("d", $num);
        
        echo "<p>La fecha aleatoria es el dia <b>".$seasonDate."</b></p>"; // He decidido invertir la tabla respecto al ejercicio porque así sale la tabla horizontal más a menudo que vertical, para ver mejor en pantalla.
        echo "<table>";
        for ($i=1 ; $i <= $month; $i++){
            echo "<tr>";
            for ($j=1 ; $j <= $day; $j++){
                echo "<td>".($i*$j)."</td>";
            }
            echo "</tr>";
        }
        echo "</table></article>";


        /**
         * CAMBIO
         * Desglosa una cantidad en billetes y monedas.
         *
         * Se genera una cantidad aleatoria entre 1 y 1000 euros, y se desglosa en la cantidad de billetes y monedas correspondientes
         * (billetes de 500, 100, 50, 20, 10, 5 y monedas de 2 y 1 euro).
         * Muestra el desglose en un artículo HTML.
         *
         * @return void
         */

        echo '<article id="sec5"><br/><h2>5. Cambio</h2>';

        $total = rand(1,1000);
        $wallet = $total;
        
        $_500 = (int)($wallet / 500);
        $wallet %= 500; // Lo mismo que $wallet = $wallet % 500;
        $_100 = (int)($wallet / 100);
        $wallet %= 100;
        $_50 = (int)($wallet / 50);
        $wallet %= 50;
        $_20 = (int)($wallet / 20);
        $wallet %= 20;
        $_10 = (int)($wallet / 10);
        $wallet %= 10;
        $_5 = (int)($wallet / 5);
        $wallet %= 5;
        $_2 = (int)($wallet / 2);
        $wallet %= 2;
        $_1 = (int)($wallet / 1);
        $wallet %= 1;

        echo "<h3>Total: 💰".$total." €</h3>";
        echo "💶 Billetes de 500: <b>".$_500."</b><br/>";
        echo "💶 Billetes de 100: <b>".$_100."</b><br/>";
        echo "💶 Billetes de 50: <b>".$_50."</b><br/>";
        echo "💶 Billetes de 20: <b>".$_20."</b><br/>";
        echo "💶 Billetes de 10: <b>".$_10."</b><br/>";
        echo "💶 Billetes de 5: <b>".$_5."</b><br/>";
        echo "🪙 Monedas de 2: <b>".$_2."</b><br/>";
        echo "🪙 Monedas de 1: <b>".$_1."</b><br/>";

        echo "</article>";




        echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><p>Carlos Sáez Blanco</p>";
    ?>

</body>
</html>