# Prueba Técnica
Me siento feliz por haber completado esta prueba técnica. El retraso en la misma, en cierta medida, se debió a mi computadora, que no se encontraba en las mejores condiciones. No pretendo justificarme, pero ciertamente fue un factor contribuyente. Espero que aprecien cómo abordé la problemática y les guste el resultado.

## Pasos 
### Instalación 
- Clonar el repositorio con el comando `git clone `
- Si el archivo .env no existe, copia el contenido del archivo .env.example y coloca los datos referentes a la base de datos.
- MRealiza la migración de la base de datos utilizando el comando `php artisan migrate``.
- Correr el servidor `php artisan serve`
- En un cliente como postman o RapidAPI ingresar la dirección  como `localhost: ` y el puerto que designe el comando anterior
## Rutas de Acceso 
Dado que me pidieron una una api todas las rutas para acceder a las acciones se encuentran en la ruta principal `api`
Rutas de acceso `localhost:puerto`
- `/api/products` método  `GET` lista todos los productos
- `/api/products/{id}` método  `GET` muestra en detalle un solo producto
- `/api/products/create` método  `POST` crea un nuevo producto
- `/api/products/{id}` método  `PUT` actualiza un producto existente
- `/api/products/{id}` método  `DELETE` elimina un prodcto de la base de datos

Los errores, ya sean de validación o de base de datos, están tratados adecuadamente. Esto incluye situaciones como la consulta de un producto inexistente, por ejemplo  `/api/products/200` lo cual devolverá un JSON con información que indica que ese modelo no existe.

Si desea ingresar al primer recurso ingrese a la vista principal de la aplicación 

# ¡GRACIAS POR LA OPORTUNIDAD!

