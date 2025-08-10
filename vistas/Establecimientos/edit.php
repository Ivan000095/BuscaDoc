<?php 
    require('../../modelos/Farmacia.php');
    $Id_Farmacia = $_REQUEST['Id_Farmacia'];
    $Farmacia = Farmacia :: find($Id_Farmacia);

?>


<html>
   <?php 
    include('../../head.php')
   
   
   
   ?>

    <body>
          <?php include('../../menu.php')?>  
           
        <div id="contenido"> 
        <br>    
        <h1 id="titulo">Editar Farmacia</h1>
        <br>
        <form action="update.php?Id_Farmacia=<?php echo $Farmacia -> Id_Farmacia;?>" method="POST">
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="<?php echo $Farmacia -> Nombre; ?>">
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="<?php echo $Farmacia -> Descripcion; ?>">
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="Horario" class="form-label">Horario</label>
                <input type="text" name="Horario" id="Horario" class="form-control" value="<?php echo $Farmacia -> Horario; ?>">
            </div>
        </div>

         <div class="row justify-content-center">
            <div class="col-4">
                <label for="Dias_labo" class="form-label">Dias Laborales</label>
                <input type="text" name="Dias_labo" id="Dias_labo" class="form-control" value="<?php echo $Farmacia -> Dias_labo; ?>">
            </div>
        </div>        
          <div class="row justify-content-center">
            <div class="col-4">
                <label for="DireccionyRef" class="form-label">Direccion y Referencia</label>
                <input type="text" name="DireccionyRef" id="DireccionyRef" class="form-control" value="<?php echo $Farmacia -> DireccionyRef; ?>">
            </div>
        </div>
        
        <br>
        <div class="row justify-content-center">
            <div class="col-4">
                <input type="reset" value="Limpiar" class="btn btn-outline-success">
                <input type="submit" value="Guardar" class="btn btn-outline-success">
            </div>
        </div>
    
            </form>
        </div>
      
        <?php include('../../footer.php')?>
    </body>
</html>
