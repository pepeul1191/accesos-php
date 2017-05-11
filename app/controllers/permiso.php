<?php

class Controller_Permiso extends Controller
{
    public static function guardar()
    {
        $data = json_decode(Flight::request()->query['data']);
        $nuevos = $data->{'nuevos'};
        $editados = $data->{'editados'};
        $eliminados = $data->{'eliminados'};
        $sistema_id = $data->{"extra"}->{'sistema_id'};
        $rpta = []; $array_nuevos = [];

        try {
            if(count($nuevos) > 0){
                foreach ($nuevos as &$nuevo) {
                    $id_generado = self::crear($sistema_id, $nuevo->{'nombre'}, $nuevo->{'llave'});
                    $temp = [];
                    $temp['temporal'] = $nuevo->{'id'};
                  $temp['nuevo_id'] = $id_generado;
                  array_push( $array_nuevos, $temp );
                }
            }
            if(count($editados) > 0){
                foreach ($editados as &$editado) {
                    self::editar($editado->{'id'}, $editado->{'nombre'}, $editado->{'llave'});
                }
            }   
            if(count($eliminados) > 0){
                foreach ($eliminados as &$eliminado) {
                    self::eliminar((int)$eliminado);
                }
            }
            $rpta['tipo_mensaje'] = 'success';
            $rpta['mensaje'] = ['Se ha registrado los cambios en los permisos', $array_nuevos];
        } catch (Exception $e) {
            #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            $rpta['tipo_mensaje'] = 'error';
            $rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de permisos', $e->getMessage()];
        }

        echo json_encode($rpta);
    }

     public static function crear($sistema_id, $nombre, $llave)
    {
        $permisos = Controller::load_model('permisos');
        return $permisos->crear($sistema_id, $nombre, $llave);
    }

    public static function editar($id, $nombre, $llave)
    {
        $permisos = Controller::load_model('permisos');
        $permisos->editar($id, $nombre, $llave);
    }

    public static function eliminar($id)
    {
        $permisos = Controller::load_model('permisos');
        $permisos->eliminar($id);
    }

    public static function listar($sistema_id)
    {
        $permisos = Controller::load_model('permisos');
        echo json_encode($permisos->listar($sistema_id));
    }

    public static function listar_asociados($rol_id)
    {
    	$permisos = Controller::load_model('permisos');
       echo json_encode($permisos->listar_asociados($rol_id));
    }
}

?>