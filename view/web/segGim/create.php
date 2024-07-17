<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
       
        'codigo_clase' => $_POST['codigo_clase'],
        'nombre_clase' => $_POST['nombre_clase'],
        'descripcion' => $_POST['descripcion'],
        'duracion' => $_POST['duracion'],
        'instructor' => $_POST['instructor'],
        'dias_semana' => $_POST['dias_semana'],
        'horario' => $_POST['horario'],
        'ubicacion' => $_POST['ubicacion'],
        'nivel' => $_POST['nivel'],
        'equipamiento' => $_POST['equipamiento'],
        'cupo' => $_POST['cupo'],
        'frecuencia' => $_POST['frecuencia'],
        'intensidad' => $_POST['intensidad'],
        'tipo_clase' => $_POST['tipo_clase'],
        'observaciones' => $_POST['observaciones'],
    ];
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json",
            'content' => json_encode($data),
        ]
    ]);
    $url = HTTP_BASE . '/controller/Seg_gimnasioController.php';
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response, true);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el adminsitrador.');</script>";
    }
}


?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Crear Producto</h1>
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
                                <h3 class="card-title">Crear Producto</h3>
                            </div>
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigo_clase">codigo_clase</label>
                                        <input type="text" class="form-control" name="codigo_clase" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_clase">nombre_clase</label>
                                        <input type="text" class="form-control" name="nombre_clase" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">descripcion</label>
                                        <input type="text" class="form-control" name="descripcion" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="duracion">duracion</label>
                                        <input type="number" class="form-control" name="duracion" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="instructor">instructor</label>
                                        <input type="number" class="form-control" name="instructor" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="dias_semana">dias_semana</label>
                                        <input type="text" class="form-control" name="dias_semana" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="horario">horario</label>
                                        <input type="text" class="form-control" name="horario" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="ubicacion">ubicacion</label>
                                        <input type="text" class="form-control" name="ubicacion" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nivel">nivel</label>
                                        <input type="text" class="form-control" name="nivel" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="equipamiento">equipamiento</label>
                                        <input type="text" class="form-control" name="equipamiento" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cupo">cupo</label>
                                        <input type="number" class="form-control" name="cupo" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="frecuencia">frecuencia</label>
                                        <input type="text" class="form-control" name="frecuencia" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="intensidad">intensidad</label>
                                        <input type="text" class="form-control" name="intensidad" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_clase">tipo_clase</label>
                                        <input type="text" class="form-control" name="tipo_clase" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="observaciones">observaciones</label>
                                        <input type="text" class="form-control" name="observaciones" required value="">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
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

