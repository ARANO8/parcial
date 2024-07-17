<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php
$p_codigo_clase = $_GET['codigo_clase'] ?? null;

$record = null;

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
            'method' => 'PUT',
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
                        <h1>Modificar Producto</h1>
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
                                <h3 class="card-title">Editar Producto</h3>
                            </div>
                            <form action="" method="post">
                                <div class="card-body">
                                <div class="form-group">
                                        <label for="codigo_clase">ID Producto</label>
                                        <input type="hidden" class="form-control" name="codigo_clase" value="<?php echo $record['codigo_clase']; ?>">
                                        <input type="number" class="form-control" value="<?php echo $record['codigo_clase'];?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_clase">nombre_clase</label>
                                        <input type="text" class="form-control" name="nombre_clase" required value="<?php echo $record['nombre_clase'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">descripcion</label>
                                        <input type="text" class="form-control" name="descripcion" required value="<?php echo $record['descripcion'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="duracion">duracion</label>
                                        <input type="text" class="form-control" name="duracion" required value="<?php echo $record['duracion'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="instructor">instructor</label>
                                        <input type="text" class="form-control" name="instructor" required value="<?php echo $record['instructor'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="dias_semana">dias_semana</label>
                                        <input type="text" class="form-control" name="dias_semana" required value="<?php echo $record['dias_semana'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="horario">horario</label>
                                        <input type="text" class="form-control" name="horario" required value="<?php echo $record['horario'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ubicacion">ubicacion</label>
                                        <input type="text" class="form-control" name="ubicacion" required value="<?php echo $record['ubicacion'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nivel">nivel</label>
                                        <input type="text" class="form-control" name="nivel" required value="<?php echo $record['nivel'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="equipamiento">equipamiento</label>
                                        <input type="text" class="form-control" name="equipamiento" required value="<?php echo $record['equipamiento'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cupo">cupo</label>
                                        <input type="number" class="form-control" name="cupo" required value="<?php echo $record['cupo'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="frecuencia">frecuencia</label>
                                        <input type="text" class="form-control" name="frecuencia" required value="<?php echo $record['frecuencia'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="intensidad">intensidad</label>
                                        <input type="text" class="form-control" name="intensidad" required value="<?php echo $record['intensidad'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_clase">tipo_clase</label>
                                        <input type="text" class="form-control" name="tipo_clase" required value="<?php echo $record['tipo_clase'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="observaciones">observaciones</label>
                                        <input type="text" class="form-control" name="observaciones" required value="<?php echo $record['observaciones'];?>">
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