<?php

class Controller_Item extends Controller
{
	public static function guardar()
	{
		$data = json_decode(Flight::request()->query['data']);
		$nuevos = $data->{'nuevos'};
		$editados = $data->{'editados'};
		$eliminados = $data->{'eliminados'};
		$id_subtitulo = $data->{"extra"}->{'id_subtitulo'};
		$rpta = []; $array_nuevos = [];

		try {
			if(count($nuevos) > 0){
				foreach ($nuevos as &$nuevo) {
				    $id_generado = self::crear($nuevo->{'nombre'}, $nuevo->{'url'},$id_subtitulo);
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
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los items', $array_nuevos];
		} catch (Exception $e) {
		    #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de items', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

    public static function menu($nombre_modulo)
    {
		$items = Controller::load_model('items');
		$items = $items->menu($nombre_modulo);
		$temp_subtitulos = [];
		$temp_items = [];
		$rpta = [];

		for($i = 0; $i < count($items); $i++){
			//print_r($items[$i]);echo "<br>";
			if(!in_array($items[$i]['subtitulo'] , $temp_subtitulos, true)){
				array_push($temp_subtitulos, $items[$i]['subtitulo']);
				$temp[0] = array('item' => $items[$i]['item'], 'url' => $items[$i]['url']);
		       $temp_items[$items[$i]['subtitulo']] = $temp;
		    }else{
		    	//var_dump($temp_items);exit();
		    	$temp = $temp_items[$items[$i]['subtitulo']];
		    	array_push($temp, array('item' => $items[$i]['item'], 'url' => $items[$i]['url']));
		    	$temp_items[$items[$i]['subtitulo']] = $temp;
		    }
		}

		foreach ($temp_subtitulos as $subtitulo) {
			#print_r($subtitulo);
			$temp = array('subtitulo' => $subtitulo, 'items' => $temp_items[$subtitulo]);
			array_push($rpta, $temp);
		}

		echo json_encode($rpta);
    }

    public static function listar_todos()
    {
    		$items = Controller::load_model('items');
		$items = $items->listar_todos();

		var_dump($items);

		echo "FALTA TERMINAR XD";
    }

    public static function listar($subtitulo_id)
    {
    		$items = Controller::load_model('items');
        	echo json_encode($items->listar($subtitulo_id));
    }

    public static function crear($nombre, $url, $id_subtitulo)
    {
    	$items = Controller::load_model('items');
		return $items->crear($nombre, $url, $id_subtitulo);
    }

    public static function editar($id, $nombre, $url)
    {
    	$items = Controller::load_model('items');
		$items->editar($id, $nombre, $url);
    }

    public static function eliminar($id)
    {
    	$items = Controller::load_model('items');
		$items->eliminar($id);
    }
}

?>