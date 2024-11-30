<?php

class ventas
{
    public $numero = "";
    public $resultado = "";

    public function establecernumeroventa($valor)
    {
        $this->numero = $valor;
    }

    public function generarventas()
    {
        if ($_SERVER)
        {
            echo "<h1>TOTAL DE VENTAS</h1>";
            $numeroventas = $_POST['numeroventas'];
            $iva = $numeroventas * 0.13;
            $cesc = $numeroventas * 0.05;
            $Total = $numeroventas + $iva + $cesc;

            echo "
            <table aling='center' border = '1'>
            <tr>
               <td colspan = '2'>Numero de Ventas</td>
               <td> $numeroventas</td>
            </tr>

            <tr>
                <td colspan = '2'>IVA(13%)</td>
                <td> $$iva</td>
            </tr>

            <tr>
                <td colspan = '2'>CESC (5%)</td>
                <td> $$cesc</td>
            </tr>

            <tr>
                <td colspan ='2'>TOTAL</td>
                <td> $$Total</td>
            </tr>
            </tr>
            </table>
            <br>";    
        }
    }
}