<?php

class Database
{
    private $_db;

    public function __construct() 
    {
        try{ 
            ORM::configure('sqlite:./db/db_accesos.db');
            ORM::configure('return_result_sets', true);
            ORM::configure('error_mode', PDO::ERRMODE_WARNING);
        }catch(Exception $e){
            echo "Verifique los parámetros de conección";
        }
    }
}

// FUENTE: http://idiorm.readthedocs.io/en/latest/configuration.html

?>
