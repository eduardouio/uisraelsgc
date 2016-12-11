Se necesitan más vistas para la pantalla que editan la pantalla home 

Tenemos el sistema de administracion del sistema tenemos que administrar las pantallas de los contenidos 

se tienen las siguientes páginas 
1.-Home 
2.-login
3.-nosotros
4.-noticias
5.-servicios
6.-Buscar

1.- El controlador del home permite tener control sobre los contenidos de la pantalla de inicio, esta permitido realizar las siguientes acciones:
permite editar los 3 articulos y sus imágenes
permite cambiar las imágnes del slider y sus textos

2.- La controlador de login permite identificar al usuario, permite
Aceptar los datos del usuario
Comprobar los datos de no ser los correctos muestra el formulario y una advrtencia
Iniciar una sesion

3,4,5.- Los controladores nosotros, noticias y servicios  son similares en su estructura por lo tanto comparten código para funcionar, estos controladores permiten.
Listar articulos de la pagina a la que el controlador representa
Eliminar Articulos de la pagina a la que el controlador representa
Crear Articulos en la pagina a la que el controlador representa
Editar articulos de la pagina a la que el controlador representa

6.-Este controlador ayuda al usuario a encontrar un articulos, en todos los controladores.
se busca los articulos de dos formas
se busca los articulos por pagina (controlador)
Se busca los articulos en todos los contraladores.

funcionamiento de las vistas:

1.- El controlador home 
El home toma vistas para mostrar los articulos del sitio y la iformacion de los slides 

El controlador  de login toma las vistas con el formulario  y la vista con el OK

Los demas controladores usan las vistas de los controladores 3,4 y 5 

