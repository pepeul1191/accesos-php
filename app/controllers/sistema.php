<?php

class Controller_Sistema extends Controller
{
	public static function guardar()
	{
		$data = json_decode(Flight::request()->query['data']);
		$nuevos = $data->{'nuevos'};
		$editados = $data->{'editados'};
		$eliminados = $data->{'eliminados'};
		$rpta = []; $array_nuevos = [];

		try {
			if(count($nuevos) > 0){
				foreach ($nuevos as &$nuevo) {
				    $id_generado = self::crear($nuevo->{'nombre'}, $nuevo->{'version'}, $nuevo->{'repositorio'});
				    $temp = [];
				    $temp['temporal'] = $nuevo->{'id'};
	              $temp['nuevo_id'] = $id_generado;
	              array_push( $array_nuevos, $temp );
				}
			}
			if(count($editados) > 0){
				foreach ($editados as &$editado) {
					self::editar($editado->{'id'}, $editado->{'nombre'}, $editado->{'version'}, $editado->{'repositorio'});
				}
			}	
			if(count($eliminados) > 0){
				foreach ($eliminados as &$eliminado) {
			    	self::eliminar((int)$eliminado);
				}
			}
			$rpta['tipo_mensaje'] = 'success';
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los sistemas', $array_nuevos];
		} catch (Exception $e) {
		    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de sistemas', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

    public static function listar()
    {
        $sistemas = Controller::load_model('sistemas');
        echo json_encode($sistemas->listar());
    }

    public static function crear($nombre, $version, $repositorio)
    {
    	$sistemas = Controller::load_model('sistemas');
		return $sistemas->crear($nombre, $version, $repositorio);
    }

    public static function editar($id, $nombre, $version, $repositorio)
    {
    	$sistemas = Controller::load_model('sistemas');
		$sistemas->editar($id, $nombre, $version, $repositorio);
    }

    public static function eliminar($id)
    {
    	$sistemas = Controller::load_model('sistemas');
		$sistemas->eliminar($id);
    }

	public static function usuario($usuario_id)
    {
        $sistemas = Controller::load_model('sistemas');
        echo json_encode($sistemas->usuario($usuario_id));
    }

    public static function asociar_usuario()
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
           $sistema_id = $nuevo->{'id'}; 
             self::asociar((int)$usuario_id, (int)$sistema_id);
         }
        }
        if(count($eliminados) > 0){
         foreach ($eliminados as &$eliminado) {
             self::desasociar((int)$usuario_id, (int)$eliminado);
         }
        }
        $rpta['tipo_mensaje'] = 'success';
              $rpta['mensaje'] = ['Se ha registrado la asociación/deasociación de los usuarios al sistema'];
       } catch (Exception $e) {
           #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
           $rpta['tipo_mensaje'] = 'error';
              $rpta['mensaje'] = ['Se ha producido un error en asociar/deasociar los usuarios al sistema', $e->getMessage()];
       }

       echo json_encode($rpta);
    }

    public function asociar($usuario_id, $sistema_id)
    {
        $sistemas = Controller::load_model('sistemas');
        $sistemas->asociar_usuario($usuario_id, $sistema_id);
    }

    public function desasociar($usuario_id, $sistema_id)
    {
        $sistemas = Controller::load_model('sistemas');
        $sistemas->desasociar_usuario($usuario_id, $sistema_id);
    }
}

?>