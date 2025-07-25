<?php 
ob_start();
include('../../modelos/Establecimiento.php'); 
$establecimiento = Establecimiento::lista();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Establecimientos</title>
    <style>
         #tabla {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #tabla td, #tabla th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #tabla tr:nth-child(even){background-color: #f2f2f2;}

            #tabla tr:hover {background-color: #ddd;}

            #tabla th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            h1 {
                text-align: center;
                font-family: Arial, sans-serif;
            }
    </style>
</head>
<body>
    <center><h1>Reporte de establecimientos</h1></center>
    <table id="tabla">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Horario</th>
                <th>Días laborales</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($establecimiento as $e): ?>
            <tr>
                <td><?= $e->Id_Establecimiento; ?></td>
                <td><?= $e->Nombre; ?></td>
                <td><?= $e->Descripcion; ?></td>
                <td><?= $e->Horario; ?></td>
                <td><?= $e->Dias_labo; ?></td>
                <td><?= $e->DireccionyRef; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php 
$html = ob_get_clean();
require_once '../../Libreria/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(['isRemoteEnabled' => true]);
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("reporte_Establecimientos.pdf", array("Attachment" => true));
?>
