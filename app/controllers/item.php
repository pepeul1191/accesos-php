<?php

class Controller_Item extends Controller
{
	public static function guardar()
	{
		
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
}

?>