<?php

//librerias
define('JQUERY','librerias/jquery-3.3.1.min.js');

//funciones
define('CONEXION_BASE_DE_DATOS','funciones/conexionBD.php');

//css
define('ESTILOS_LOGIN','css/disenio_login.css');
define('ESTILOS_ALTA_EMPLEADOS','css/styles_altaEmpleados.css');
define('ESTILOS_BIENVENIDO','css/disenio_bienvenido.css');
define('ESTILOS_DETALLES_EMPLEADOS','css/disenio_detalles.css');
define('ESTILOS_TABLA','css/disenio_tabla.css');
define('ESTILOS_LISTA_EMPLEADOS','css/styles.css');
define('ESTILOS_NAVBAR','css/disenio_navbar.css');

//javascript
define('VALIDAR_EXISTE_USUARIO','js/validar_usuario.js');
define('ELIMINAR_EMPLEADO','js/eliminar_tabla.js');
define('VALIDAR_SI_EXISTE_CORREO','js/validar_correo.js');
define('VALIDAR_NO_ESTE_VACIO_EMPLEADO','js/validar_empleado.js');
define('VALIDAR_CAMPOS_EDITAR','js/validar_editarEmpleado.js');

//vistas
define('IR_A_PANTALLA_BIENVENIDO','bienvenido.php');

//Respuestas ajax
define('PHP_EXISTE_CORREO','ajax/empleados_correo.php');
define('PHP_ELIMINAR_EMPLEADO','ajax/empleados_elimina.php');
define('PHP_EXISTE_USUARIO','ajax/valida_usuario.php');

?>