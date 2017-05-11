<?php

class Controller_Modulo extends Controller
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
				    $id_generado = self::crear($nuevo->{'nombre'}, $nuevo->{'url'}, $sistema_id);
				    $temp = [];
				    $temp['temporal'] = $nuevo->{'id'};
	              $temp['nuevo_id'] = $id_generado;
	              array_push( $array_nuevos, $temp );
				}
			}
			if(count($editados) > 0){
				foreach ($editados as &$editado) {
					self::editar($editado->{'id'}, $editado->{'nombre'}, $editado->{'url'});
				}
			}	
			if(count($eliminados) > 0){
				foreach ($eliminados as &$eliminado) {
			    	self::eliminar((int)$eliminado);
				}
			}
			$rpta['tipo_mensaje'] = 'success';
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los modulos', $array_nuevos];
		} catch (Exception $e) {
		    #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de modulos', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

    public static function listar($sistema_id)
    {
        $modulos = Controller::load_model('modulos');
        echo json_encode($modulos->listar($sistema_id));
    }

    public static function listar_menu()
    {
    	 $sistema = Flight::request()->query['sistema'];
        $modulos = Controller::load_model('modulos');
        echo json_encode($modulos->listar_menu($sistema));
    }

    public static function crear($nombre, $url, $sistema_id)
    {
    	$modulos = Controller::load_model('modulos');
		return $modulos->crear($nombre, $url, $sistema_id);
    }

    public static function editar($id, $nombre, $url)
    {
    	$modulos = Controller::load_model('modulos');
		$modulos->editar($id, $nombre, $url);
    }

    public static function eliminar($id)
    {
    	$modulos = Controller::load_model('modulos');
		$modulos->eliminar($id);
    }
}

?>