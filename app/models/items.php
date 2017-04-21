<?php

class Items extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function menu($nombre_modulo)
	{
		return ORM::for_table('items')->raw_query('
            SELECT I.nombre AS item, I.url, S.nombre AS subtitulo FROM items I 
            INNER JOIN subtitulos S ON I.subtitulo_id = S.id
            INNER JOIN modulos M ON S.modulo_id = M.id
            WHERE M.nombre = :nombre', array('nombre' => $nombre_modulo))->find_array();
	}

	public function listar_todos()
	{
		return ORM::for_table('items')->raw_query('
            SELECT M.nombre AS modulo , M.icono AS icono,S.nombre AS subtitulo,
            GROUP_CONCAT(I.nombre || "::" || I.url, "||") AS items
            FROM items I 
            INNER JOIN subtitulos S ON I.subtitulo_id = S.id
            INNER JOIN modulos M ON S.modulo_id = M.id
            GROUP BY subtitulo
            ORDER BY modulo')->find_array();
	}
}

?>