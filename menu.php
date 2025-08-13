<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
        <a class="navbar-brand" id="logoletras">BuscaDoc</>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (isset($_SESSION['Rol'])) { ?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" id="elementos">
                    <li class="nav-item"><a href="/BuscaDoc/index.php?Rol=<?php echo $_SESSION['Rol']; ?>" class="nav-link light">Inicio</a></li>
                    <li class="nav-item"><a href="/BuscaDoc/quienessomos.php?Rol=<?php echo $_SESSION['Rol']; ?>" class="nav-link">¿Quiénes somos?</a></li>
                    <li class="nav-item"><a href="/BuscaDoc/contacto.php?Rol=<?php echo $_SESSION['Rol']; ?>" class="nav-link">Contacto</a></li>
                    <li class="nav-item"><a href="/BuscaDoc/comentarios.php?Rol=<?php echo $_SESSION['Rol']; ?>" class="nav-link">Comentarios</a></li>

                    <?php if (isset($_GET['Rol']) && $_GET['Rol'] == 'Usuario') { ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Servicios</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/BuscaDoc/vistas/Doctores/vista.php?Rol=<?php echo $_SESSION['Rol']; ?>">Médicos</a></li>
                                <li><a class="dropdown-item" href="/BuscaDoc/vistas/Establecimientos/vista.php?Rol=<?php echo $_SESSION['Rol']; ?>">Farmacias</a></li>
                            </ul>
                        </li>
                    <?php } elseif (isset($_GET['Rol']) && $_GET['Rol'] == 'Administrador') { ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administrar</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/BuscaDoc/vistas/Doctores/index.php?Rol=<?php echo $_SESSION['Rol']; ?>">Médicos</a></li>
                                <li><a class="dropdown-item" href="/BuscaDoc/vistas/Establecimientos/index.php?Rol=<?php echo $_SESSION['Rol'];?>">Farmacias</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <div class="dropdown" id="cant">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-circle"></i> Mi perfil</a>
                        <ul class="dropdown-menu">
                            <?php if($_SESSION['Rol'] == 'Usuario'){ ?>
                                <li><a href="miperfil.php?Rol=<?php echo $_SESSION['Rol']?>&id=<?php echo $_SESSION['cliente']; ?>" class="dropdown-item"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['Nombre']; ?></a></li>
                            <?php } ?>
                            <?php if($_SESSION['Rol'] == 'Doctor'){ ?>
                                <li><a class="dropdown-item" href="/BuscaDoc/vistas/Doctores/vercitas.php?Rol=<?php echo $_SESSION['Rol']; ?>&id=<?php echo $_SESSION['doctor']; ?>"><i class="bi bi-calendar-date"></i> Mis citas</a></li>
                            <?php }?>
                            <?php if($_SESSION['Rol'] == 'Usuario'){ ?>
                                <li><a class="dropdown-item" href="/BuscaDoc/vercitas.php?Rol=<?php echo $_SESSION['Rol']; ?>&id=<?php echo $_SESSION['cliente']; ?>"><i class="bi bi-calendar"></i> Solicitudes</a></li>
                            <?php }?>
                            <li><a class="dropdown-item" href="/BuscaDoc/logout.php"><i class="bi bi-box-arrow-right"></i> Salir</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        <?php } else { ?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" id="elementos">
                    <li class="nav-item"><a href="/BuscaDoc/index.php" class="nav-link light">Inicio</a></li>
                    <li class="nav-item"><a href="/BuscaDoc/quienessomos.php" class="nav-link">¿Quiénes somos?</a></li>
                    <li class="nav-item"><a href="/BuscaDoc/contacto.php" class="nav-link">Contacto</a></li>
                    <li class="nav-item"><a href="/BuscaDoc/comentarios.php" class="nav-link">Comentarios</a></li>
                </ul>
                <a id="btnlog" class="btn btn-outline-default ms-3" href="/BuscaDoc/create.php" id="pel">
                    <i class="bi bi-person-circle"></i> Registrarse/Iniciar sesión
                </a>
            </div>
        <?php } ?>
    </div>
</nav>
