<?php

class Controller_Usuario extends Controller
{
    public static function asociar_permisos()
    {
       $data = json_decode(Flight::request()->query['data']);
       $usuario_id = $data->{'extra'}->{'usuario_id'};
       $nuevos = $data->{'nuevos'};
       $editados = $data->{'editados'};
       $eliminados = $data->{'eliminados'};
       $rpta = []; $array_nuevos = [];

       try {
        if(count($nuevos) > 0){
         foreach ($nuevos as &$nuevo) {
           $permiso_id = $nuevo->{'id'}; 
             self::asociar_permiso((int)$usuario_id, (int)$permiso_id);
         }
        }
        if(count($eliminados) > 0){
         foreach ($eliminados as &$eliminado) {
             self::desasociar_permiso((int)$usuario_id, (int)$eliminado);
         }
        }
        $rpta['tipo_mensaje'] = 'success';
              $rpta['mensaje'] = ['Se ha registrado la asociación/deasociación de los permisos al usuario'];
       } catch (Exception $e) {
           #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
           $rpta['tipo_mensaje'] = 'error';
              $rpta['mensaje'] = ['Se ha producido un error en asociar/deasociar los permisos al usuario', $e->getMessage()];
       }

       echo json_encode($rpta);
    }

    public static function asociar_permiso($usuario_id, $permiso_id)
    {
        $usuarios = Controller::load_model('usuarios');
        $usuarios->asociar_permiso($usuario_id, $permiso_id);
    }

    public static function desasociar_permiso($usuario_id, $permiso_id)
    {
        $usuarios = Controller::load_model('usuarios');
        $usuarios->desasociar_permiso($usuario_id, $permiso_id);
    }

    public static function asociar_roles()
    {
        $data = json_decode(Flight::request()->query['data']);
        #$usuario_id = $data->{"extra"}->{'usuario_id'};
       $usuario_id = $data->{'extra'}->{'usuario_id'};
       $nuevos = $data->{'nuevos'};
       $editados = $data->{'editados'};
       $eliminados = $data->{'eliminados'};
       $rpta = []; $array_nuevos = [];

       try {
        if(count($nuevos) > 0){
         foreach ($nuevos as &$nuevo) {
           $rol_id = $nuevo->{'id'}; 
             self::asociar_rol((int)$usuario_id, (int)$rol_id);
         }
        }
        if(count($eliminados) > 0){
         foreach ($eliminados as &$eliminado) {
             self::desasociar_rol((int)$usuario_id, (int)$eliminado);
         }
        }
        $rpta['tipo_mensaje'] = 'success';
              $rpta['mensaje'] = ['Se ha registrado la asociación/deasociación de los roles al usuario'];
       } catch (Exception $e) {
           #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
           $rpta['tipo_mensaje'] = 'error';
              $rpta['mensaje'] = ['Se ha producido un error en asociar/deasociar los roles al usuario', $e->getMessage()];
       }

       echo json_encode($rpta);
    }

    public static function asociar_rol($usuario_id, $rol_id)
    {
        $usuarios = Controller::load_model('usuarios');
        $usuarios->asociar_rol($usuario_id, $rol_id);
    }

    public static function desasociar_rol($usuario_id, $rol_id)
    {
        $usuarios = Controller::load_model('usuarios');
        $usuarios->desasociar_rol($usuario_id, $rol_id);
    }

    public static function listar()
    {
       $usuarios = Controller::load_model('usuarios');
        echo json_encode($usuarios->listar()); 
    }

    public static function listar_accesos($usuario_id)
    {
        $accesos_usuarios = Controller_Acceso::listar_accesos($usuario_id);
        echo json_encode($accesos_usuarios); 
    }

    public static function listar_permisos($sistema_id, $usuario_id)
    {
        $usuarios = Controller::load_model('usuarios');
        $permisos_usuarios = $usuarios->listar_permisos($sistema_id, $usuario_id);
        echo json_encode($permisos_usuarios); 
    }

    public static function listar_roles($sistema_id, $usuario_id)
    {
        $usuarios = Controller::load_model('usuarios');
        $roles_usuarios = $usuarios->listar_roles($sistema_id, $usuario_id);
        echo json_encode($roles_usuarios); 
    }

    public static function validar()
    {
       $usuarios = Controller::load_model('usuarios');
       $usuario = Flight::request()->query['usuario'];
       $contrasenia = Flight::request()->query['contrasenia'];
       $rpta = $usuarios->validar($usuario, $contrasenia);

       if($rpta == 1){

       }

        echo $rpta;
    }

      public static function validar_nombre_repetido()
      {
        $usuarios = Controller::load_model('usuarios');
        $data = json_decode(Flight::request()->query['data']);
        $usuario_id = $data->{'id'};
        $usuario = $data->{'usuario'};
       
        if($usuario_id == 'E'){
              #estamos hablando de un usuario nuevo, no tiene que repetirse el nombre
            $rpta = $usuarios->validar_usuario_repetido($usuario);
        }else{
            #estamos hablando de un usuario a ediatr, no tiene que repetirse el nombre a menos que estemo
            $rpta = $usuarios->validar_usuario_repetido_editado($usuario_id, $usuario);
            if($rpta == 1){
                $rpta = 0;
            }else{
                $rpta = $usuarios->validar_usuario_repetido($usuario);
            }
        }

        echo $rpta;
      }

      public static function validar_correo_repetido()
      {
        $usuarios = Controller::load_model('usuarios');
        $data = json_decode(Flight::request()->query['data']);
        $correo_id = $data->{'id'};
        $correo = $data->{'correo'};
       
        if($correo_id == 'E'){
              #estamos hablando de un correo nuevo, no tiene que repetirse el nombre
            $rpta = $usuarios->validar_correo_repetido($correo);
        }else{
            #estamos hablando de un correo a ediatr, no tiene que repetirse el nombre a menos que estemo
            $rpta = $usuarios->validar_correo_repetido_editado($correo_id, $correo);
            if($rpta == 1){
                $rpta = 0;
            }else{
                $rpta = $usuarios->validar_correo_repetido($correo);
            }
        }

        echo $rpta;
      }
}

?>