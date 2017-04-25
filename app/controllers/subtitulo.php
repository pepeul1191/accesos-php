<?php

class Controller_Subtitulo extends Controller
{
	public static function guardar()
	{
		$data = json_decode(Flight::request()->query['data']);
		$nuevos = $data->{'nuevos'};
		$editados = $data->{'editados'};
		$eliminados = $data->{'eliminados'};
		$modulo_id = $data->{"extra"}->{'id_modulo'};
		$rpta = []; $array_nuevos = [];

		try {
			if(count($nuevos) > 0){
				foreach ($nuevos as &$nuevo) {
				    $id_generado = self::crear($nuevo->{'nombre'}, $modulo_id);
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
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los subtitulos', $array_nuevos];
		} catch (Exception $e) {
		    #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de subtitulos', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

    public static function listar($modulo_id)
    {
        $subtitulos = Controller::load_model('subtitulos');
        echo json_encode($subtitulos->listar($modulo_id));
    }

    public static function crear($nombre, $modulo_id)
    {
    	$subtitulos = Controller::load_model('subtitulos');
		return $subtitulos->crear($nombre, $modulo_id);
    }

    public static function editar($id, $nombre)
    {
    	$subtitulos = Controller::load_model('subtitulos');
		$subtitulos->editar($id, $nombre);
    }

    public static function eliminar($id)
    {
    	$subtitulos = Controller::load_model('subtitulos');
		$subtitulos->eliminar($id);
    }
}

?>