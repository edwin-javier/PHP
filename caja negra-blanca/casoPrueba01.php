<html>
    <head>

    </head>
    <body>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="numeroventas">Cantidad de Ventas: </label>
            <input type="number" name="numeroventas" id="numeroventas" />
            <br>
            <input type="submit" value="Calcular" />
        </form>
        <?php        
            if($_POST)
            {
                $numeroventas = $_POST["numeroventas"];

                echo "
                <form action='procesar.php'>
                ";
                //Construir la lista de cajas
                echo "<table width='600px'>";
                for($i=1;$i<=$numeroventas;$i++)
                {
                    echo "
                    <tr>
                        <td>Venta $i</td>
                        <td><input type='number' name='caja[]' placeholder='Venta $i'></td>
                    </tr>
                    ";
                }                  
                echo"
                <tr>
                    <td colspan='2'>
                    <input type='submit' value='Procesar'>
                    </td>
                </tr>
                </table>
                </form>
                ";              
            }

             require('procesar.php');
                $venta = "";
                $resultado = ""; 

                if($_POST)
                {
                    $venta = $_POST['numeroventas'];
                    $objetoventa = new Ventas();
                    $objetoventa->establecernumeroventa($venta);
                    $objetoventa->generarventas();
                    $resultado = $objetoventa->resultado;
                }
        ?>
    </body>
</html>