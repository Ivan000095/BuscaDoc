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
                <li class="nav-item"><a href="/ServiFinder/index.php" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="/ServiFinder/index.php#quienesomos" class="nav-link">¿Quienes somos?</a></li>
                <li class="nav-item"><a href="/ServiFinder/index.php#Contacto" class="nav-link">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="/Servifinder/index.php#comentarios">Comentarios</a></li>
                <?php
                    if( isset($_SESSION['usuario']) ) {
                ?>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link" style="">Servicios</a>
                    <ul class="dropdown-menu">
                        <li><a href="/ServiFinder/vistas/Doctores/vista.php">Médicos</a></li>
                        <li><a href="/ServiFinder/vistas/Profesionistas/vista.php">Profesionistas</a></li>
                        <li><a href="/ServiFinder/vistas/Establecimientos/vista.php">Establecimientos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link">Administrar</a>
                    <ul class="dropdown-menu">
                        <li><a href="/ServiFinder/vistas/Doctores">Médicos</a></li>
                        <li><a href="/ServiFinder/vistas/Profesionistas">Profesionistas</a></li>
                        <li><a href="/ServiFinder/vistas/Establecimientos">Establecimientos</a></li>
                    </ul>
                </li>
                <?php       
                    }
                ?>              
            </ul>
                <a id="btnlog" class="btn btn-outline-dark" href="/ServiFinder/create.php"><i class="bi bi-person"></i>  Registrarse/Iniciar sesión</i></a>
        </div>
    </div>
</nav>