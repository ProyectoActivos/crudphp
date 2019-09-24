<?php
require'funcionesCronograma.php';
try{
        $conexion = new PDO('mysql:host=localhost;dbname=GestionActivos','root','');
    }catch(PDOException $e){
        echo "ERROR: " . $e->getMessge();
        die();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = limpiarDatos($_POST['id']);
        $idmaquina = limpiarDatos($_POST['idmaquina']);
        $idtecnico = limpiarDatos($_POST['idtecnico']);
        $tmantenimiento = limpiarDatos($_POST['tmantenimiento']);
        $finicio = limpiarDatos($_POST['finicio']);
        $ffin = limpiarDatos($_POST['ffin']);
        $observacion = limpiarDatos($_POST['observacion']);
        $fallas = limpiarDatos($_POST['fallas']);

        $statement = $conexion->prepare(
        "UPDATE CRONOGRAMAS SET
        IDMAQUINA = :idmaquina,
        IDTECNICO = :idtecnico,
        TMANTENIMIENTO = :tmantenimiento,
        FINICIO = :finicio,
        FFIN = :ffin,
        OBSERVACION = :observacion,
        FALLAS = :fallas
        WHERE ID =:id");

        $statement ->execute(array(
            ':id'=>$id,
            ':idmaquina'=> $idmaquina,
            ':idtecnico'=> $idtecnico,
            ':tmantenimiento'=> $tmantenimiento,
            ':finicio'=> $finicio,
            ':ffin'=> $ffin,
            ':observacion'=> $observacion,
            ':fallas'=> $fallas
            ));
        header('Location: cronograma.php');
    }else{
        $id = id_numeros($_GET['id']);
        if(empty($id)){
            header('Location: cronograma.php');
        }
        $contacto = obtener_id($conexion,$id);

        if(!$contacto){
            header('Location: cronograma.php');
        }
        $contacto =$contacto[0];
    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>GESTION DE CRONOGRAMA</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" >

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


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
                    <a class="navbar-brand" href="cronograma.php">GESTION DE CRONOGRAMA</a>
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
                                <h4 class="title">Actualizar CRONOGRAMA</h4>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $contacto['ID'];?>" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                        <label class="control-label">ID Máquina:</label>
                                                        <input type="number" class="form-control" required="" name="idmaquina" value="<?php echo $contacto['IDMAQUINA'];?>">
                                                    <i class="material-input"></i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label">ID Técnico:</label>
                                                        <input type="number" class="form-control" required="" name="idtecnico" value="<?php echo $contacto['IDTECNICO'];?>">
                                                    <i class="material-input"></i></div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Tiempo de Mantenimiento:</label>
                                                        <input type="text" class="form-control" required="" name="tmantenimiento" value="<?php echo $contacto['TMANTENIMIENTO'];?>">
                                                    <i class="material-input"></i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Fecha de Inicio:</label>
                                                        <input type="date" class="form-control" required="" name="finicio" value="<?php echo $contacto['FINICIO'];?>">
                                                    <i class="material-input"></i></div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Fecha Fin:</label>
                                                        <input type="date" class="form-control" required="" name="ffin" value="<?php echo $contacto['FFIN'];?>">
                                                    <i class="material-input"></i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Observación:</label>
                                                        <input type="text" class="form-control" required="" name="observacion" value="<?php echo $contacto['OBSERVACION'];?>">
                                                    <i class="material-input"></i></div>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="form-group label-floating is-empty">
                                                        <label class="control-label">Fallas:</label>
                                                        <input type="text" class="form-control" required="" name="fallas" value="<?php echo $contacto['FALLAS'];?>">
                                                    <i class="material-input"></i></div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Actualizar Cronograma</button>
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
                            <a href="index.php">
                                Cronograma
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>


    </div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


</html>