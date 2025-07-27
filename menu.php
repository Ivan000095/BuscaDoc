<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#" id="logoletras">
            BuscaDoc
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/BuscaDoc/index.php" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="/BuscaDoc/quienessomos.php" class="nav-link">¿Quienes somos?</a></li>
                <li class="nav-item"><a href="/BuscaDoc/contacto.php" class="nav-link">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="/BuscaDoc/comentarios.php">Comentarios</a></li>
                <?php
                    if(isset($_GET['Rol']) && $_GET['Rol'] == 'Usuario' ) {
                ?>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link" style="">Servicios</a>
                    <ul class="dropdown-menu">
                        <li><a href="/BuscaDoc/vistas/Doctores/vista.php">Médicos</a></li>
                        <li><a href="/BuscaDoc/vistas/Establecimientos/vista.php">Farmacia</a></li>
                    </ul>
                </li>
                 <?php       
                    } elseif(isset($_GET['Rol']) && $_GET['Rol'] == 'Administrador'){
                ?>  
                <li class="nav-item dropdown">
                    <a href="" class="nav-link">Administrar</a>
                    <ul class="dropdown-menu">
                        <li><a href="/BuscaDoc/vistas/Doctores">Médicos</a></li>
                        <li><a href="/BuscaDoc/vistas/Profesionistas">Profesionistas</a></li>
                        <li><a href="/BuscaDoc/vistas/Establecimientos">Establecimientos</a></li>
                    </ul>
                </li>
                  <?php       
                    }else{
                ?>            
            </ul>
                <a id="btnlog" class="btn btn-outline-dark" href="/BuscaDoc/create.php"><i class="bi bi-person"></i>  Registrarse/Iniciar sesión</i></a>
                <?php 
                    }
                ?>
        </div>
    </div>
</nav>