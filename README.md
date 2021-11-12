+ LINEAS DE COMANDO +
#1 composer create-project laravel/laravel nombreAplicacion
creo la aplicacion

#2 composer require laravel/ui
habilito los comandos "artisan"

#3 php artisan make:model NombreModolo -mcr
creo un modelo con su respectivo model, controller y resource(view) de manera automatica

#3.1
php artisan make:migration create_empleados_table
creamos una migracion

#3.2
php artisan migrate
migracion todas las tablas

#4 php artisan route:list
imprimo por consola las rutas habilitadas
sirve para detectar como accedo a cada funcion y el protocolo HTTP que utilizan

#5 php artisan ui bootstrap --auth
implemento la interfaz de bootstrap y un sistema de logeo y autenticacion

#6 npm install
compilo tanto los archivos Sass para convertirlos a CSS plano así como el archivo 
resources/js/app.js, al ejecutar

#7 npm run dev
volvemos a tener la funcionalidad en nuestra aplicación

#8 php artisan migrate
migra las tablas configuradas a la base de datos

#9 php artisan make:component Alert
creo un componente, este se almacena en la carpeta views/components.
y puede ser utilizado de la siguiente forma <x-componentName></x-componentName>

###### LINEAS DE BLADE ######
#1 @csrf
llave de seguridad solicitada por Laravel, se utiliza en los formularios

#2 @include('modelo.view');
se utiliza para importar una vista (componente), dentro de otra
Ej: cuando se reutilizo el formulario en la vista de crear y editar empleado

#3 @include('empleado.form',['nombreVar'=>'contenidoVar'])
le envio una variable a la vista que estoy por importar

#4 {{$var}}
accedo a la variable que traspase con la linea anterior

#5 {{method_field('PROTOCOLO UTILIZADO')}}
se utiliza dentro de los formularios. Se utiliza para indicar que protocolo utiliza la
funcion que llamamos en el action, el protocolo que utiliza la funcion lo veremos al listar
las rutas con: php artisan route:list

#6 {{url('/empleado/'.$empleado->id)}}
Utilizado en el action del form, indico la direccion (funcion), tambien se ven al acceder
por consola el codigo: php artisan route:list

#7 {!! $modelo->links() !!}
se utiliza luego del cierre de la tabla, y habilita el paginado

* ORGANIZACION DE LOS ARCHIVOS *
#1 resources/views
donde estan las vistas

#2 app/Models
donde estan los modelos

#3 app/http/Controllers
donde estan los controladores

#4 resources/layouts
donde se encuentra el navbar generado por bootstrap --auth

#5 app/providers
donde esta el archivo encargado de habilitar la paginacion en las tablas

#6 storage/app/public/uploads
donde se almacenan las fotos que se cargan de los formularios

#7 resources/routes
archivo donde se manejan las rutas: web.php

#./env
se configura la base de datos