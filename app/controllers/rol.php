<?php

class Controller_Rol extends Controller
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
				    $id_generado = self::crear($nuevo->{'nombre'}, $sistema_id);
				    $temp = [];
				    $temp['temporal'] = $nuevo->{'id'};
	              $temp['nuevo_id'] = $id_generado;
	              array_push( $array_nuevos, $temp );
				}
			}
			if(count($editados) > 0){
				foreach ($editados as &$editado) {
					self::editar($editado->{'id'}, $editado->{'nombre'});
				}
			}	
			if(count($eliminados) > 0){
				foreach ($eliminados as &$eliminado) {
			    	self::eliminar((int)$eliminado);
				}
			}
			$rpta['tipo_mensaje'] = 'success';
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los roles', $array_nuevos];
		} catch (Exception $e) {
		    #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de roles', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

	 public static function crear($nombre, $sistema_id)
    {
    	$roles = Controller::load_model('roles');
		return $roles->crear($nombre, $sistema_id);
    }

    public static function editar($id, $nombre)
    {
    	$roles = Controller::load_model('roles');
		$roles->editar($id, $nombre);
    }

    public static function eliminar($id)
    {
    	$roles = Controller::load_model('roles');
		$roles->eliminar($id);
    }

	public static function listar($sistema_id)
    {
    	$roles = Controller::load_model('roles');
		echo json_encode($roles->listar($sistema_id));
    }

    public static function asociar_permisos()
    {
    	$data = json_decode(Flight::request()->query['data']);
        #$rol_id = $data->{"extra"}->{'rol_id'};
       $rol_id = $data->{'extra'}->{'id_rol'};
       $nuevos = $data->{'nuevos'};
       $editados = $data->{'editados'};
       $eliminados = $data->{'eliminados'};
       $rpta = []; $array_nuevos = [];

       try {
        if(count($nuevos) > 0){
         foreach ($nuevos as &$nuevo) {
           $permiso_id = $nuevo->{'id'}; 
             self::asociar_permiso((int)$rol_id, (int)$permiso_id);
         }
        }
        if(count($eliminados) > 0){
         foreach ($eliminados as &$eliminado) {
             self::desasociar_permiso((int)$rol_id, (int)$eliminado);
         }
        }
        $rpta['tipo_mensaje'] = 'success';
              $rpta['mensaje'] = ['Se ha registrado la asociación/deasociación de los permisos al rol'];
       } catch (Exception $e) {
           #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
           $rpta['tipo_mensaje'] = 'error';
              $rpta['mensaje'] = ['Se ha producido un error en asociar/deasociar los permisos al rol', $e->getMessage()];
       }

       echo json_encode($rpta);
    }

    public static function asociar_permiso($rol_id, $permiso_id)
    {
        $roles = Controller::load_model('roles');
        $roles->asociar_permiso($rol_id, $permiso_id);
    }

    public static function desasociar_permiso($rol_id, $permiso_id)
    {
        $roles = Controller::load_model('roles');
        $roles->desasociar_permiso($rol_id, $permiso_id);
    }
}

?>