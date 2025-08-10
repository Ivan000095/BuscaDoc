<html>
   <?php 
    include('../../head.php');
    include('../../modelos/Farmacia.php');
    $Farmacia = Farmacia::lista();
    ?>
    <body>
        <?php include('../../menu.php')?>    
        <section id="contenido"> 
        <br>
        <h1 id="titulo">Farmacias</h1>
        <br>
        <a href="reporte.php" class="btn btn-outline-success" id="btnrepo"><i class="bi bi-filetype-pdf"></i> Reporte en PDF</a>
        <a href="create.php" class="btn btn-outline-success" id="btnadd"><i class="bi bi-person-add"></i> Agregar</a>
        <br> 
            <table class="table table-striped" id="tabla-catalogo">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Horario</th>
                    <th>Dias laborales</th>
                    <th>Foto</th>
                    <th>Direccion</th>
                    <th>Puntuacion</th>
                </tr>
                <?php 
                foreach($Farmacia as $e){
                ?>
                 <tr>
                    <td> <?php echo $e->Id_Farmacia; ?> </td>
                    <td> <?php echo $e->Nombre; ?></td>
                    <td> <?php echo $e->Descripcion; ?></td>
                    <td> <?php echo $e->Horario; ?></td>
                    <td> <?php echo $e->Dias_labo; ?></td>
                    <td><img src="../../uploads/<?= $e->Foto ?>" alt="<?= $e->Nombre ?>" width="100px"/></td>
                    <td> <?php echo $e->DireccionyRef; ?></td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                            <a href="edit.php?Id_Farmacia=<?php echo $e->Id_Farmacia; ?>">
                                <button style="border: none; background: none;"><i class="bi bi-pencil-fill"></i></button>
                            </a>
                            </div>
                            <div class="col-6">
                                <form action="destroy.php?Id_Farmacia=<?php echo $e->Id_Farmacia; ?>" method="POST" id="form<?php echo $e->Id_Farmacia;?>" class="inline">
                                    <button style="border: none; background: none;" type="button" onclick="borrar(<?php echo $e->Id_Farmacia; ?> ,'<?php echo $e->Nombre; ?>' )"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>    
            </table>
        </section>
      
        <?php include('../../footer.php')?>
    
        <script type="text/javascript">
            function borrar(id, Nombre){
               var continuar = confirm('¿Deseas borrar el Farmacia seleccionado? ' + id + " "+ Nombre);
                if(continuar){
                   var formulario = document.getElementById('form' + id);
                    formulario.submit();
                }
            }

        </script>
    </body>
</html>
