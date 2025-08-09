<!-- Comentarios -->
<?php
    include('modelos/Comentario.php');
    session_start();
?>

<html>
    <?php include ('head.php')?>
    <body>
        <?php include ('menu.php')?>        
        <!-- Reseñas -->
        <section style="margin: 5%;" id="contenido">
            <h5>Agrega una reseña</h5>
            <form action="comentar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                <div class="mb-3">
                    <textarea class="form-control" name="comentario" rows="3" placeholder="Escribe tu reseña..." required></textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-outline-success" id="btnres">Enviar Reseña</button>
                </div>
            </form>
            <hr>
            <!-- Comentarios -->
            <?php $comentarios = Comentario::findcom(); ?>

            <h5>Comentarios recientes</h5>
            <?php if ($comentarios && $comentarios->num_rows > 0): ?>
                <?php while ($r = $comentarios->fetch_assoc()): ?>
                    <div class="d-flex flex-start mb-3">
                        <img class="rounded-circle shadow-1-strong me-3"
                            src="<?= htmlspecialchars($r['Foto']) ?>" alt="avatar" width="60" height="60" />
                        <div>
                            <h6 class="fw-bold mb-1"><?= htmlspecialchars($r['Nombre']) ?></h6>
                            <p class="mb-0"><?= htmlspecialchars($r['Comentario']) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-muted">Aún no hay reseñas.</p>
            <?php endif; ?>
        </section>
        <?php include('footer.php')?>
    </body>
</html>