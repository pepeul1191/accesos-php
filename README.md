# Accesos SQLite - PP

### Tecnologías

+ PHP (5.3+)
+ SQLite3
+ Composer

### Instalación - Despliegue

 	$ composer update

### Para recargar el autoload de clases:

 	$ composer dump-autoload -o

 Thanks/Credits

    Pepe Valdivia: developer Software Web Perú [http://softweb.pe]

### Descipción

Servicio web desarrollado en PHP usando el framework FlightPHP, con patrones de diseño front-controller y distpacher y la interfaz de Idiorm para interactuar con la base de datos.

### Rutas

+ get 'usuario/listar', to: 'usuario#listar'
+ get 'usuario/listar_permisos/:usuario_id', 'usuario/listar_permisos'
+ post 'usuario/validar', to: 'usuario#validar'

### Rutas - Descripción

#### [URL] + usuario/listar

<b>Objetivo(s)</b>

Devolver un listado de todos los datos de los usuarios.

<b>Método HTTP</b>

+ GET

<b>Parámetros</b>

+ Argumentos en la url : ninguno
+ Query Params : ninguno 

<b>Formato de respuesta OK</b>

JSON string de la lista de usuarios.

> {"id":1,"usuario":"pepe","contrasenia":"ujaGz6w7QkJOKec1YkSkNgu4RGJIHYxkjpdpHx/YU/w=","correo":"jvaldivia@softweb.pe","estado_usuario_id":1}{"id":2,"usuario":"yacky","contrasenia":"ujaGz6w7QkJOKec1YkSkNiB4CQM2YMjqrX5tyjAyXaY=","correo":"yramirez@disenoreal.com","estado_usuario_id":1}{"id":3,"usuario":"rails","contrasenia":"Z66FgGws3EKbDFPViiEnSA==","correo":"jvaldivia@softweb.pe","estado_usuario_id":1}{"id":4,"usuario":"fuel","contrasenia":"QJOPfBjSrktR5f4aZKOaGpdZs8fnwzYAoT3F2dOrIks=","correo":"jvaldivia@softweb.pe","estado_usuario_id":1}

<b>Formato de respuesta alternativo </b>

+ Los generados por las excepciones controladas con el siguiente formato:

> {"tipo_mensaje":"error","rpta_mensaje":"mensaje personalizado","error":"Error en string de la excepción"}

---

#### [URL] + usuario/validar

<b>Objetivo(s)</b>

Validar si el usuario y contraseña ingresada conincide con la base de datos.

<b>Método HTTP</b>

+ POST

<b>Parámetros</b>

+ Argumentos en la url : ninguno
+ Query Params : usuario, contrasenia

<b>Formato de respuesta OK</b>

Devuelve '1' si el usuario y contraseña existen y coinciden con un registro de la base de datos, '0' si no existe coincidencia

> 1

<b>Formato de respuesta alternativo </b>

+ Los generados por las excepciones controladas con el siguiente formato:

> {"tipo_mensaje":"error","rpta_mensaje":"mensaje personalizado","error":"Error en string de la excepción"}

+ Si no existe o no hay coincidencia con el usuario y contraseña:

> 0

---

#### [URL] + usuario/listar_usuarios

<b>Objetivo(s)</b>

Devolver un listado sólo el campo usuario de los usuarios.

<b>Método HTTP</b>

+ GET

<b>Parámetros</b>

+ Argumentos en la url : ninguno
+ Query Params : ninguno

<b>Formato de respuesta OK</b>

Devuelve un arraglo de JSONs en string, cada JSON tendrá sólo la llave usuario y su respectivo valor.

> [{"usuario":"pepe"},{"usuario":"yacky"},{"usuario":"rails"},{"usuario":"fuel"}]

<b>Formato de respuesta alternativo </b>

+ Los generados por las excepciones controladas con el siguiente formato:

> {"tipo_mensaje":"error","rpta_mensaje":"mensaje personalizado","error":"Error en string de la excepción"}

---

#### [URL] + usuario/listar_permisos/:usuario_id

<b>Objetivo(s)</b>

Devolver un listado de los permisos de un usuario.

<b>Método HTTP</b>

+ GET

<b>Parámetros</b>

+ Argumentos en la url : usuario_id
+ Query Params : ninguno

<b>Formato de respuesta OK</b>

Devuelve un arraglo de JSONs en string, cada JSON mostrando el id, nombre del permiso y su respectivo valor.

> [{"id":1,"nombre":"Crear usuario","existe":0,"llave":"crear_usuario"},{"id":3,"nombre":"Editar usuario","existe":0,"llave":"editar_usuario"},{"id":4,"nombre":"Ver usuario","existe":0,"llave":"ver_usuario"}]

<b>Formato de respuesta alternativo </b>

+ Los generados por las excepciones controladas con el siguiente formato:

> {"tipo_mensaje":"error","rpta_mensaje":"mensaje personalizado","error":"Error en string de la excepción"}

--- 

#### Fuentes

Sequel - ORM a la base de datos

+ http://idiorm.readthedocs.io/
	
Framework FlightPHP :

+ http://flightphp.com/

Composer :
+ http://phpenthusiast.com/blog/how-to-autoload-with-composer

Otros:
+ http://www.smarty.net/