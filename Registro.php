<html>
   <?php 
    include('head.php'); 
   ?>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <script>
        window.addEventListener('load', () => {
            var modal = new bootstrap.Modal(document.getElementById('modal'));
            modal.show();
        });
    </script>
    <?php endif; ?>
<body>  
    <?php include('menu.php')?>
    <div id="contenido"> 
        <br>    
        <h1 id="titulo"><i class="bi bi-person-add"></i> Registrarme</h1>
        <br>
        <form action="crearusuario.php" method="POST" enctype="multipart/form-data">
        <!-- Nombre -->
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>
        </div>   
        <!-- Coreeo -->
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Correo" class="form-label">Correo</label>
                <input type="text" name="Correo" id="Correo" class="form-control" required>
            </div>
        </div>
        <!-- Contraseña -->
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>   
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
        </div>  
        <br>
        <div class="row justify-content-center">
            <div class="col-4">
                <input type="reset" value="Limpiar" class="btn btn-outline-success">
                <input type="submit" value="Registrarse" class="btn btn-outline-success">
            </div>
        </div>
      </form>
    </div>
    <?php include('footer.php')?>
    </body>
</html>