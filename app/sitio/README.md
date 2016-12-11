ispade
======

Trabajo de fin de carrera Eduardo Villota

Notas.---

Modelo de base de datos IanCMS.-
Antes de entrar en esta seccion recordemos el patroón de diseño que se va a usar para generar la aplicacion MCV esta es la primera parte de la estrcutura de la aplicación, El modelo es el objeto encargado de manejar la informacion de la base de datos, tiene acceso directo a los datos y responde a su clase superior que en este caso es el controlador, el controlador o clase de un nivel superior no tiene acceso directo a los datos la forma de obtenerlos es a travez de los metodos de la clase que funciona como modelo.

al ser el modelo nuestra puerta de enlace con la base de datos debemos dotarlo de todos los metodos necesarios para interactuar con el modelo de base de datos y ademas debe servirnos de ayuda para encontrar algun problema que se pueda producir en en esta capa de la aplicacion, com por ejemplo un error de sintaxis en la query, una falla del servidor, caida de servicio, lentitud y adventencias por parte del servidor de bases de datos, incluso errores de acceso al servidor.

Los metodos que se concideran necesarios para esta clase son:

Lectura de las tablas
Estas obiamente son consultas tipo SELECT con todas las posibilidades que esta sentencia tiene como son el where order by limit, entre otros.

Escritura de registros
Es una consulta tipo INSERT normal que contien el nombre de la columna y el valor que le corresponde

Actualizacion de registros
Estas son consultas tipo UPDATE con todas las opciones que ofrece

eliminar Registros
Tipo de consulta Delete con todas las posibilidades que estas tienen

conteo de registros afectados en una consulta
Esto sirve para mostrar información al usuario.

abrir la coneccion a la base
abre una conexion concurrente con el servidor idicado

cerrar una coneccion a la base de datos
cierra una conexion concurrente con el servidor

Ultimo id ingresado en la base de datos
Este es especialmente util, lo unico que hace es retornar el  valor del último ID ingresado en la base de datos, por el ultimo ID se entiende al identificador del ultimo registro sin importar la tabla en la que fue ingresado, veamos la forma de usarlo,  cuando se está trabajando con multiples tablas y estas estan guaran una relacion unas con otras, entidades padre e hijo, si se desea ingresar informacion en la tabla padre y luego uno o mas registros en la tabla hija. se usa esta funcionalidad veamos un ejemplo:

Tabla padre
Factura

Tabla Hijo 
Factura detalle

Imaginemos que tenemos que facturar 10 productos, el encabezado de la factura es la misma para los diez registros de la factura pero los registros de los productos son individuales y son enlazados al registro de la factura. El proceso es el siguiente primero se ingresa el encabezado de la factura porque es el regitro padre, luego se puede recuperar el ultimo id de la base de datos qie corresponderia al id de la factura con ese id se enlazan los registros hijos.

Tambien existen metodos que sirven para depurar como son:

El sql de la última consultaww
El ultimo error retornado por el motor de bases de datos
La ultima advertencia enviada por el motor de base de datos

Tenemos metodos adicionales como son

Respaldo de la base de datos
Ejecutar consultas en transaccion
ejecutar consultas complejas definidas por el administrador

Nota: para la creación del modelo, se procede a usar las funcionalidades provistas pro codeigniter

---------




Se tiene tres tipos de paginas 
Home.
Formulario de contactos
presentacion de contenidos


El home no es mas que las noticias del sitio o sus contenidos más importantes, unos links que te llevan a articulos mostrado en una pantalla de presentacion de contenidos, las pantallas de presentacion de contenidos tienen la informacion del sitio los atriculos no se presentan envebidos en la pagina sino en ventanas emergentes tipo modal, 

Las imagnes de los contenidos se las va a almacenar en la base de datos, para que sea mucho más facil obtenerlas y guardarlas, en lugar de hacerlo por manejo de archivos en php, a pesar de que es mejor guardar las imágenes en el sitio que en la base de datos, pero en esta.

Base de datos.-

Tabla Page, se controla que no se repitan las paginas haciendo que el titulo y la url sean unicas en la tabla,
Tabla Article, Se controla que no se repitan los articulos a travez del titulo y la url, los cuales deben ser unicos
para cada articulo en el sitio.



Pagina Home.-

Esta ṕagina debe tener en su portada los tres aticulos más reñevantes del sitio, (con esto me refiero a los articlos con más lecturas), 

slide Home, en este lugar se lugar se muestran conecciones a articulos de mayor interes, por referencia se va a poner una coneccion a las paginas del sitio es decir, uno para servicios, otro para nosotros, y otro para contactos, y un slide de bienvenida.

articulos home.- Al tener los tres articulos debajo del home, se decide colocar alli los mas relevantes, los tres más relevantes del sitio, se conserva las mismas imágenes siempre para no perder el diseño, pero de ser posible se inrustará las imagnes de los articulos.



URls

Todos los articulos tienen el titulo en letra capital, la primera letra de cada parabla en mayúscula y las demas on minúsculas

Antes de entrar en el asunto del manejo de las rutas, recordemos como maneja las urls codeigniter, ya que en este principio estará  basado.

http://sitio/index.php/controller/method/param

Para codeigniter esta urlñ está segmentada de manera que cada barra inclinada "/" es la separacion de un segmento y tiene una funcion propia quedando asi

http://sitio.com/index.php/controller/method/param
		1		2			3 		4		5

La primera parte es la direccion del sitio, la segunda parte es el index del sitio, que es el controlador principal del framework, el tercero es el nombre del  controlador, el cuarto es el nombre de la función que pertenece al controlador a partir del quinto elemento de la url son los parámetros que el metodo necesesita para trabajar.


Recordando esto, la url de los articulos esta compuesta por el titulo,  es el titulo en minusculas sin tildes, reemplazando los caracteres de espacio por guines bajos, de no funcionar estará dado por el id del articulo...

Se trata de manejar los articulos de manera que sea facil de encontrar, me gustaria manejar los articulos por el nombre, en lugar del id, es mucho más elaborado y de mejor aspecto, consideremos el funcionamiento de un controlador que tiene que buscar el articulo y mostrarlo en pantalla y la forma en la que los articulos estan distribuidos en la base de datos.

Primero que nada tenemos las paginas que son las que poseen los articulos, luego de ello tenemos los articulos que pertenecen a una pagina, es por esto que se registra en la base de datos una relacion entre pagina y articulo en tablas diferentes, veamos las estructuras de las tablas 

Tabla Paginas

+--------------+----------------------+
| Field        | Type                 |
+--------------+----------------------+
| id_article   | smallint(5) unsigned |
| id_page      | smallint(5) unsigned |
| title        | varchar(500)         |
| url          | varchar(500)         |
| image        | varchar(300)         |
| content      | mediumtext           |
| counter      | smallint(5) unsigned |
| visible      | smallint(5) unsigned |
| create_date  | datetime             |
| last_update  | timestamp            |
| publish_down | datetime             |
+--------------+----------------------+


Tabla Articulos

+--------------+----------------------+
| Field        | Type                 |
+--------------+----------------------+
| id_article   | smallint(5) unsigned |
| id_page      | smallint(5) unsigned |
| title        | varchar(500)         |
| url          | varchar(500)         |
| image        | varchar(300)         |
| content      | mediumtext           |
| counter      | smallint(5) unsigned |
| visible      | smallint(5) unsigned |
| create_date  | datetime             |
| last_update  | timestamp            |
| publish_down | datetime             |
+--------------+----------------------+


Como podemos ver en las dos tenemos el campo url que es la que almacena el identificador del articulo y de la paginaa, tomemos como principio una direccion de un articulo completo basado en las url de codeigniter.

http://sitio/index.php/noticias/articulo/mi_primer_articulo

Con esto podemos decir que noticias es el nombre del controlador, art es el metodo del controlador y mi_primer_articulo es el parametro de esta función, entonces en las tablas solo se almacenas el nombre del controlador y el nombre del articulo que es el identificador del articulo respectivamente.


Imagenes

Se tiene dos formas de manejar las imagnes, una de ellas es hacerlo por manejo de archivos que no es mas que copiar las imaganes a un directorio en el servidor , la otra forma es garabarlas directamente en la base de datos, bien veamos las ventajas y desventajas de cada una de las alternativas.

La primera subir las imagenes al servidor.
a travez de http se sube las imágenes al servidor para que este los almacene en un lugar indicado, se crea un vinculo o se obtiene la direccion de la imganen y se la enlaza al articulo que pertenece.
ventajas-
Mejor velocidad de enlace de la imagen
Te permite almacenar las imagenes en categorias
puedes acceder a las imágenes directamente.
buen tiempo de respuesta
desventajas:
No se puede hacer una busqueda rápida a menos que esté bien organizado



Subir las imágenes a la base de datos
Para que esto sea posible se debe transformar a binario el fichero de la imágen, los ficheros son pesados
Para mostrarlo basta con volver a la imágen y mostrarla.

Ventajas.-
Menos cantidad de código para hacer la misma accion
imganes centralizadas y codificadas
desventajas:
Se consume recursos del servidor transformando a binario y devolviendo al archivo
Con el tiempo el motor de base de datos se va a volver lento
tiempo de respuesta un poco más lento


Una vez analizado todas estan cuestiones llegamos a la conclucion de que subir las imágnes al servidor es mejor que subirlas a las bases de datos, ahora bien esto no es un descubrimiento que acabo de hacer, es un estándar dentro del desarrollo web aunque nadie impide que se suban lás imágenes a la base de datos, de echo se lo puede hacer en el caso de un sitio que no tenga demasiadas publicaciones ni trafico, se podria decir que es conveniente para un sitio con 5000 mil visitas unicas diarias, pero yo prefiero hacer las cosas bien.


Una vez tomada la decición para el manejo de las imágenes del sitio veamos como lo vamos a organizar todo, desde la ubicacion de los ficheros hasta los enlaces a dichas imágenes.

├── appweb
│   ├── controllers
│   │   ├── home.php
├── css
│   ├── bootstrap.css
│   └── slider.css
├── ico
│   └── favicon.ico
├── img
│   ├── article
│   │   ├── art1.png
│   │   ├── art2.png
│   ├── portada
│   │   ├── img1.png
│   │   ├── img2.png
│   ├── sitio
│   │   ├── slide1.jpg
│   │   ├── slide2.jpg
├── js
│   ├── bootstrap.js
│   ├── jquery.js
│   └── vendor
│       ├── jquery-1.8.2.min.js
│       └── modernizr-2.6.2.min.js

Como se puede apreciar en el arbol de directorios, cada uno de los componentes del sitio están en un lugar facil de encontrar y con un nombre que lo identifica, en esta gráfica no se incluyen todos los ficheros solamente algunos para que se entienda mejor el problema. para que las cosas queden distriuidas de la mejor manera creo que es necesario que las impagenes estén categorizadas en directorios diferentes de acuerdo a la página a la que pertenecen.

Dentro del directorio img vamos a crear un nuevo subdiectorio llamado article, en este lugar se lamacenarán todas las imágenes de los articulos, tambien se puede crear un directorio para cada tipo de imágenes como, me refiero a las imágenes del home, imágenes de noticias, servicios, etc. pero sería  complejo subir los archivos a esos directorios con un solo uploader, prefiro hacerlo de la manera más sencilla que es subir los ficheros a un solo directorio y nombrarlos con un único nombre, incluso si existe una imágen que ya existe se puede reutilizar la imágen.

Procedimeinto para el almacenamiento y referenciado a los directorios.

1.- Se sube el fichero al directorio indicado
2.- Se renombra la imágen, acorde al nombre del artículo lo que ayuda a definir su url
3.- se inserta en link en el texto del articulo.

Todas las imagens van a la izquierda del texto del articulo.
la url general de una imágen es http://sitio/img/articulo/nombre_imagen.ext

modelo ed base de datos.-
Siguiendo el funcionamient basico del sistema tenemos que seguir una rquitectura de diseño que es el MVC (modelo-vista controlador).

El modelo es el que se encaraga de administrar los datos de la base de datos, es el unico que interactua con el motor de datos sirve como un ente intermediario entre la app y los datos.

El controlador es el encargado de hacer funcionar el sitio y se los va a dividir en uno por cada pagina del sitio, la funcionalidad que se repita en los controladores será cargada en un controlador global a manera de funciones a las que las clases tienen acceso.

.. pendiente la creacion de las clases de lo controadores


Eliminar article de la tabla article y por ende eliminarlo de las vistas

