Como ya sabemos, muchas veces, cuando llenamos el formulario, el usuario ingresa dos veces a la misma URL.

La primera, por **GET** para ver el formulario.

La segunda, por **POST** una vez que se llena y se envía la información.

Laravel nos permite dividir la lógica de ambos pedidos ya que nos permite escribir dos rutas diferentes que respondan a cada uno de los métodos.

Dado esto te pedimos:

> 1. Arma una ruta a "/registracion" por **GET** que retorne el texto "Registrese"

> 2. Arma una ruta a "/registracion" por **POST** que retorne el texto "Bienvenido"

Podes asumir que estas escribiendo tu solución directamente en el archivo de rutas.