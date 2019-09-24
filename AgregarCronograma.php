<?php
require'funciones.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idmaquina = limpiarDatos($_POST['idmaquina']);
        $idtecnico = limpiarDatos($_POST['idtecnico']);
        $tmantenimiento = limpiarDatos($_POST['tmantenimiento']);
        $finicio = limpiarDatos($_POST['finicio']);
        $ffin = limpiarDatos($_POST['ffin']);
        $observacion = limpiarDatos($_POST['observacion']);
        $fallas = limpiarDatos($_POST['fallas']);
    $mensaje='';
    if(empty($idmaquina) or empty($idtecnico)  or empty($mantenimiento) or empty($inicio) or empty($fin) or empty($observacion) or empty($fallas)){
        $mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
    }
    else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=GestionActivos','root','');
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
            die();
        }
    }
    if($mensaje==''){
        $statement = $conexion->prepare(
        'INSERT INTO CRONOGRAMAS values(null, :idmaquina,:idtecnico,:tmatenimiento,:finicio,:ffin,:observacion,:fallas)');

        $statement ->execute(array(
        ':idmaquina'=>$idmaquina,
        ':idtecnico'=>$idtecnico,
        ':tmantenimiento'=>$tmantenimiento,
        ':finicio'=>$finicio,
        ':ffin'=>$ffin,
        ':observacion'=>$observacion,
        ':fallas'=>$fallas
        ));
        header('Location: cronogramas.php');
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>GESTIÓN DE TECNICOS</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" >
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="active">
                <a href="index.php">
                    <i class="pe-7s-note2"></i>
                    <p>INICIO</p>
                </a>
                <a href="cronograma.php">
                    <i class="pe-7s-note2"></i>
                    <p>CRONOGRAMAS</p>
                </a>
                <a href="tecnicos.php">
                    <i class="pe-7s-note2"></i>
                    <p>TÉCNICOS</p> 
                </a>                    
            </li>
        </ul>
    </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <i class="sr-only">Toggle navigation</i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </button>
                    <a class="navbar-brand" href="tecnicos.php">GESTION DE TECNICOS</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Agregar Tecnicos</h4>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Nombre:</label>
                                                        <input type="text" class="form-control" required="" name="nombre">
                                                    <i class="material-input"></i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Apellido:</label>
                                                        <input type="text" class="form-control" required="" name="apellido">
                                                    <i class="material-input"></i></div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                        <label class="control-label">DNI:</label>
                                                        <input type="text" class="form-control" required="" name="dni">
                                                    <i class="material-input"></i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Teléfono:</label>
                                                        <input type="text" class="form-control" required="" name="telefono">
                                                    <i class="material-input"></i></div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Agregar Tecnico</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php  if(!empty($mensaje)): ?>
                                    <div class="alert alert-danger">
                                        <p><b> Error - </b> <?php echo $mensaje; ?></p>
                                    </div>
                                <?php  endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                NUEVO
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>


    </div>
</div>
</body>

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
    <script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/demo.js"></script>


</html>