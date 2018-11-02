Nuesto sistema tiene como regla que la apuesta mínima es de $50. Es más, esta definido que si el usuario, no aclara el monto de su apuesta, por defecto se asume que esta apostando $50.

Para esto vamos a modificar la ruta de la ruleta para que la apuesta sea optativa. Dicho de otro modo, nuestro sistema tiene que poder reaccionar a:

> 1. **/ruleta/12/500** indicando que el usuario apuesta $500 al número 12

> 2. **/ruleta/35** indicando que el usuario apuesta $50 (valor por defecto) al número 35