<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
        <a class="navbar-brand" id="logoletras">BuscaDoc</>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/BuscaDoc/" class="nav-link light">Inicio</a></li>
                <li class="nav-item"><a href="/BuscaDoc/quienessomos.php" class="nav-link">¿Quiénes somos?</a></li>
                <li class="nav-item"><a href="/BuscaDoc/contacto.php" class="nav-link">Contacto</a></li>
                <li class="nav-item"><a href="/BuscaDoc/comentarios.php" class="nav-link">Comentarios</a></li>

                <?php if (isset($_GET['Rol']) && $_GET['Rol'] == 'Usuario') { ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Servicios</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/BuscaDoc/vistas/Doctores/vista.php">Médicos</a></li>
                            <li><a class="dropdown-item" href="/BuscaDoc/vistas/Establecimientos/vista.php">Farmacias</a></li>
                        </ul>
                    </li>
                <?php } elseif (isset($_GET['Rol']) && $_GET['Rol'] == 'Administrador') { ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administrar</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/BuscaDoc/vistas/Doctores/index.php?Rol=<?php echo $_SESSION['Rol']; ?>">Médicos</a></li>
                            <li><a class="dropdown-item" href="/BuscaDoc/vistas/Establecimientos">Farmacias</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>

            <?php if (isset($_SESSION['Rol'])) { ?>
                <span>
                    <?php echo $_SESSION['Nombre']; ?><abbr title=""><i class="bi bi-person"></i></abbr>
                </span>
                <a id="btnlog" class="btn btn-outline-default ms-3" href="/BuscaDoc/logout.php" style="width: 6%">
                    <i class="bi bi-box-arrow-right"></i> Salir
                </a>
            <?php } else { ?>
                <a id="btnlog" class="btn btn-outline-default ms-3" href="/BuscaDoc/create.php">
                    <i class="bi bi-person"></i> Registrarse/Iniciar sesión
                </a>
            <?php } ?>
        </div>
    </div>
</nav>
