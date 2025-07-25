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
        <h1 id="titulo">Inicia sesión</h1>
        <br>
        <form action="validausuario.php" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Correo" class="form-label">Nombre</label>
                <input type="text" name="Correo" id="Correo" class="form-control" required>
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>     
        <br>
        <div class="row justify-content-center">
            <div class="col-4">
                <input type="reset" value="Limpiar" class="btn btn-outline-success">
                <input type="submit" value="Iniciar sesión" class="btn btn-outline-success">
                <a href="Registro.php"class="btn btn-outline-success">Registrarse</a>
            </div>
        </div>
      </form>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body text-danger fs-5">
                        Credenciales Incorrectas
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php')?>
    </body>
</html>