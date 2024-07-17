<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php
$p_codigo_clase = $_GET['codigo_clase'] ?? null;

$record = null;

if ($p_codigo_clase) {
    $url = HTTP_BASE . '/controller/Seg_gimnasioController.php?ope=filterId&codigo_clase=' . $p_codigo_clase;
    $reponse = file_get_contents($url);
    $reponseData = json_decode($reponse, true);
    if ($reponseData &&  $reponseData['ESTADO'] == 1 && !empty($reponseData['DATA'])) {
        $record = $reponseData['DATA'][0];
    } else {
        $record = null;
    }
}

?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ver Detalle de Clase de Gimnasio</h1>
                        <?php var_dump($p_codigo_clase);?>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ver Clase</h3>
                            </div>
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigo_clase">Codigo Clase</label>
                                        <input type="hidden" class="form-control" name="codigo_clase" value="<?php echo $record['codigo_clase']; ?>">
                                        <input type="text" class="form-control" value="<?php echo $record['codigo_clase']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_clase">nombre_clase</label>
                                        <input type="text" class="form-control" name="nombre_clase" required value="<?php echo $record['nombre_clase']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">descripcion</label>
                                        <input type="text" class="form-control" name="descripcion" required value="<?php echo $record['descripcion']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="duracion">duracion</label>
                                        <input type="text" class="form-control" name="duracion" required value="<?php echo $record['duracion']; ?> " disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="instructor">instructor</label>
                                        <input type="text" class="form-control" name="instructor" required value="<?php echo $record['instructor']; ?> " disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="dias_semana">dias_semana</label>
                                        <input type="text" class="form-control" name="dias_semana" required value="<?php echo $record['dias_semana']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="horario">horario</label>
                                        <input type="text" class="form-control" name="horario" required value="<?php echo $record['horario']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="ubicacion">ubicacion</label>
                                        <input type="text" class="form-control" name="ubicacion" required value="<?php echo $record['ubicacion']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nivel">nivel</label>
                                        <input type="text" class="form-control" name="nivel" required value="<?php echo $record['nivel']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="equipamiento">equipamiento</label>
                                        <input type="text" class="form-control" name="equipamiento" required value="<?php echo $record['equipamiento']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="cupo">cupo</label>
                                        <input type="number" class="form-control" name="cupo" required value="<?php echo $record['cupo']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="frecuencia">frecuencia</label>
                                        <input type="text" class="form-control" name="frecuencia" required value="<?php echo $record['frecuencia']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="intensidad">intensidad</label>
                                        <input type="text" class="form-control" name="intensidad" required value="<?php echo $record['intensidad']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_clase">tipo_clase</label>
                                        <input type="text" class="form-control" name="tipo_clase" required value="<?php echo $record['tipo_clase']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="observaciones">observaciones</label>
                                        <input type="text" class="form-control" name="observaciones" required value="<?php echo $record['observaciones']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-default" href="<?php echo HTTP_BASE; ?>/web/segGim/list">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include ROOT_VIEW . "/template/footer.php"; ?>