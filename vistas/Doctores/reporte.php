<?php
ob_start();
include('../../head.php');
include('../../modelos/Doctor.php');
$doctor = Doctor::lista();
?>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Establecimientos</title>
    <style>
         #tabla {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
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
              <th>Especialidad</th>
              <th>Nombre</th>
              <th>Cédula</th>
              <th>Género</th>
              <th>Costo</th>
              <th>Horario</th>
              <th>Días laborales</th>
              <th>Ubicación</th>
            </tr>
         </thead>
        <tbody>
            <?php
            foreach ($doctor as $d){
            ?>
            <tr>
                <td><?php echo $d->nombreespe; ?></td>
                <td><?php echo $d->nombre; ?></td>
                <td><?php echo $d->cedula; ?></td>
                <td><?php echo $d->genero; ?></td>
                <td>$<?php echo $d->costo; ?></td>
                <td><?php echo $d->horario; ?></td>
                <td><?php echo $d->diaslab; ?></td>
                <td><?php echo $d->ubicacion; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>  
    </table>
</html>
<?php
$html=ob_get_clean();

require_once '../../Libreria/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf-> loadHtml($html);
$dompdf-> setPaper('a4', 'landscape');

$dompdf->render();

$dompdf->stream("reporte_Doctores.pdf", array("Attachment" => true));



?>