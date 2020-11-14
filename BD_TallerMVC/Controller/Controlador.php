<?php

$admin = "../Views/Admin/main.php";
$prestamo = "../Views/Prestamos.php";

//Url Views Admin
$viewSala = "../Views/Admin/Sala/view.php";
$viewUsua = "../Views/Admin/Usuario/view.php";
$viewEqui = "../Views/Admin/Equipo/view.php";
$viewPres = "../Views/Admin/Prestamo/view.php";

//Url Inserts Admin
$PresI = "../Views/Admin/Prestamo/insert.php";
$UsuaI = "../Views/Admin/Usuario/insert.php";
$EquiI = "../Views/Admin/Equipo/insert.php";
$SalaI = "../Views/Admin/Sala/insert.php";

//Url Updates Admin
$PresU = "../Views/Admin/Prestamo/update.php";
$UsuaU = "../Views/Admin/Usuario/update.php";
$EquiU = "../Views/Admin/Equipo/update.php";
$SalaU = "../Views/Admin/Sala/update.php";

// Controladores Sala
if ($_GET['accion'] == 'viewS') {
    header('Location:' . $viewSala);
} elseif ($_GET['accion'] == 'addS') {
    header('Location:' . $SalaI);
} elseif ($_GET['accion'] == 'DS') {
    require_once '../ModelDAO/SalaDAO.php';
    $sal = new SalaDAO();
    $sal->eliminar($_GET['id']);
    header('Location:' . $viewSala);

    // Controladores Usuario
} elseif ($_GET['accion'] == 'viewU') {
    header('Location:' . $viewUsua);
} elseif ($_GET['accion'] == 'addU') {
    header('Location:' . $UsuaI);
} elseif ($_GET['accion'] == 'DU') {
    require_once '../ModelDAO/UsuarioDAO.php';
    $usu = new UsuarioDAO();
    $usu->eliminar($_GET['id']);
    header('Location:' . $viewUsua);

    // Controladores Equipo
} elseif ($_GET['accion'] == 'viewE') {
    header('Location:' . $viewEqui);
} elseif ($_GET['accion'] == 'addE') {
    header('Location:' . $EquiI);
} elseif ($_GET['accion'] == 'DE') {
    require_once '../ModelDAO/EquipoDAO.php';
    $equ = new EquipoDAO();
    $equ->eliminar($_GET['id']);
    header('Location:' . $viewEqui);

    // Controladores prestamo
} elseif ($_GET['accion'] == 'viewP') {
    header('Location:' . $viewPres);
} elseif ($_GET['accion'] == 'addP') {
    $IPUC = $_GET["IP"];
    header('Location:' . $PresI);
} elseif ($_GET['accion'] == 'DP') {
    require_once '../ModelDAO/PrestamoDAO.php';
    $pre = new PrestamoDAO();
    $pre->eliminar($_GET['id']);
    header('Location:' . $viewPres);
}

switch ($_GET["accion"]) {
    case 'login':
        require_once '../ModelDAO/UsuarioDAO.php';
        $usu = new UsuarioDAO();
        $rs = $usu->lista($_POST['pass']);
        $user;
        $pass;
        $rol;
        foreach ($rs as $row) {
            $pass = $row['usua_id'];
            $user = $row['usua_nombres'];
            $rol = $row['usua_rol'];
        }

        if ($user == $_POST['user'] && $pass == $_POST['pass']) {
            if ($rol == 'Admin') {
                session_start();
                echo $_SESSION['login'] = $user;
                echo $_SESSION['Admin'] = true;
                header('Location:' . $admin);
            } else {
                session_start();
                echo $_SESSION['login'] = $user;
                header('Location:' . $prestamo);
            }
        } else {
            echo '<h2>El Usuario o la contraseña ingresados son incorrectos</h2>';
            header('Refresh: 3; URL=../index.php');
        }
        break;

    case 'Salir':
        if ($_GET['a'] == 'ip') {
            // Sesion iniciada
            session_start();
            //Eliminar todas la variables de la Sesion
            $_SESSION['login'];
            session_unset();
            //Destruir la sesion
            session_destroy();
            header("Location: ../index.php");
        } else {
            // Sesion iniciada
            session_start();
            //Eliminar todas la variables de la Sesion
            $_SESSION['login'];
            $_SESSION['Admin'];
            session_unset();
            //Destruir la sesion
            session_destroy();
            header("Location: ../index.php");
        }

        break;

    // Controladores prestamo
    case 'IP':
        require_once '../ModelDAO/PrestamoDAO.php';
        $pres = [
            'id' => $_POST['id'],
            'usua' => $_POST['usuario'],
            'equi' => $_POST['equipo'],
            'fecha' => $_POST['fecha']
        ];
        $dao = new PrestamoDAO();
        $dao->insertar($pres);
        if ($IPUC == 'U') {
            header('Location:' . $prestamo);
        } else {
            header('Location:' . $viewPres);
        }
        break;

    case 'UP':
        require_once '../ModelDAO/PrestamoDAO.php';
        $pres = [
            'id' => $_POST['id'],
            'usua' => $_POST['usuario'],
            'equi' => $_POST['equipo'],
            'fecha' => $_POST['fecha']
        ];
        $dao = new PrestamoDAO();
        $dao->actualizar($pres, $_POST['idU']);
        header('Location:' . $viewPres);
        break;

    // Controladores Equipo
    case 'IE':
        require_once '../ModelDAO/EquipoDAO.php';
        $equi = [
            'id' => $_POST['id'],
            'descri' => $_POST['descri'],
            'estado' => $_POST['estado'],
            'sala' => $_POST['sala']
        ];
        $dao = new EquipoDAO();
        $dao->insertar($equi);
        header('Location:' . $viewEqui);
        break;

    case 'UE':
        require_once '../ModelDAO/EquipoDAO.php';
        $equi = [
            'id' => $_POST['id'],
            'descri' => $_POST['descri'],
            'estado' => $_POST['estado'],
            'sala' => $_POST['sala']
        ];
        $dao = new EquipoDAO();
        $dao->actualizar($equi, $_POST['idU']);
        header('Location:' . $viewEqui);
        break;

    // Controladores Sala
    case 'IS':
        require_once '../ModelDAO/SalaDAO.php';
        $sala = [
            'id' => $_POST['id'],
            'nombre' => $_POST['name'],
            'cantidad' => $_POST['cantidad']
        ];
        $dao = new SalaDAO();
        $dao->insertar($sala);
        header('Location:' . $viewSala);
        break;

    case 'US':
        require_once '../ModelDAO/SalaDAO.php';
        $sala = [
            'id' => $_POST['id'],
            'nombre' => $_POST['name'],
            'cantidad' => $_POST['cantidad']
        ];
        $dao = new SalaDAO();
        $dao->actualizar($sala, $_POST['idU']);
        header('Location:' . $viewSala);
        break;

    // Controladores Usuario
    case 'IU':
        require_once '../ModelDAO/UsuarioDAO.php';
        $usua = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'rol' => $_POST['rol'],
            'img' => addslashes(file_get_contents($_FILES['foto']['tmp_name']))
        ];
        $dao = new UsuarioDAO();
        $dao->insertar($usua);
        header('Location:' . $viewUsua);
        break;

    case 'UU':
        require_once '../ModelDAO/UsuarioDAO.php';
        $usua = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'rol' => $_POST['rol'],
            'img' => addslashes(file_get_contents($_FILES['foto']['tmp_name']))
        ];
        $dao = new UsuarioDAO();
        $dao->actualizar($usua, $_POST['idU']);
        header('Location:' . $viewUsua);
        break;

    default:
        echo '<h2> Error 404 Not folder<p>El Controlador no pudo encontrar la ruta</h2>';
        echo '<a href="../index.php">Intentar de nuevo</a>';
        //header('Location: index.php';
        break;
}
