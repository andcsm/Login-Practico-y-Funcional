# Comó puedo usar este sencillo y funcional Login

## Pasos con respecto a la base de datos:

- Crear una base de datos MySQL.
- Crear una tabla para almacenar los usuarios "users".
- Crear los campos "email" y "password".
- Completar la tabla con los campos que se requieran.

## Pasos con respecto al archivo connection.php

Cambiar los siguientes parametros de conexión en el archivo.
Correspondientes a los que usted este usando.

- Dirección/Ruta del servidor de base de datos.
- Usuario de la base de datos.
- Contraseña de acceso a la base de datos.
- Nombre de la base de datos.

## Desarrolle el Frontend de su Login Page al gusto.

Solo debe tener en cuenta que debe enviar al servidor, con el metodo POST, los datos ingresados
por el usuario. El archivo verify-user.php espera recibir 2 variables "email" y "password".
Este los procesara y redireccionara al usuario a su dashboard, de lo contrario devolvera un error.
