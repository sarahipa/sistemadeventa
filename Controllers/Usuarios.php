<?php
class Usuarios extends Controller{

    public function __construct() {
        session_start();
        parent::__construct();
    }

    public function index()
    {
    
      $data['cajas'] = $this->model->getCajas();
      //  print_r($this->model->getUsuario());
      $this->views->getView($this, "index", $data);

    }

    public function listar()
    {
       $data = $this->model->getUsuarios();

       for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {

               $data[$i]['estado'] = '<span style="background-color: green;" class="badge badge-primary">Activo</span> ';
               //agregue el color por que no quiso jalar como en el video xd
            }else{

               $data[$i]['estado'] = '<span style="background-color: red;" class="badge badge-danger">Inactivo</span>';
           
            }

           $data[$i]['acciones'] = '<div>
           <button class="btn btn-primary" type="button">Editar</button>
           <button class="btn btn-danger" type="button">Eliminar</button>
           </div>';

       }

       echo json_encode($data, JSON_UNESCAPED_UNICODE);
       die();
    }

    public function validar()
    {
        if (empty($_POST['usuario']) ||  empty($_POST['clave'])) {

            $msg = "los campos estan vacios";

        }else{

            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $data = $this->model->getUsuario($usuario, $clave);

            if ($data) {
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $msg = 'ok';
            }else{
                $msg = "Usuaurio o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $confirmar = $_POST['confirmar'];
        $caja = $_POST['caja'];
        if (empty($usuario) || empty($nombre) || empty($clave) || empty($caja)) {
            $msg = "Todos los campos son obligatorios";
        }else if($clave != $confirmar){
            $msg = "Las contraseñas no coinciden";
        }else{
            $data = $this->model->registrarUsuario($usuario, $nombre, $clave, $caja);
            if ($data == "ok") {
                $msg = "si";
            }else{
                $msg = "Error el registrar al usuario";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
}


?>





