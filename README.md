# Plataforma de reseñas de productos

Aplicación web donde los usuarios publican reseñas de productos que han comprado, con imagen, marca, tiempo de uso y lugar de compra. Incluye registro de usuarios, inicio de sesión y un panel de administrador.

## Funciones

- Registro de usuarios con foto de perfil y tipo de usuario.
- Inicio y cierre de sesión.
- Agregar, modificar, eliminar y listar reseñas.
- Subida de imágenes para cada reseña.
- Buscador de reseñas.
- Panel de administrador.

## Tecnologías

PHP, MySQL, HTML5, CSS3 y Bootstrap.

## Cómo ejecutarlo

1. Instala XAMPP (o cualquier servidor con PHP y MySQL).
2. Copia la carpeta del proyecto dentro de `htdocs`.
3. Crea la base de datos `proyecto_resenias` con el script de `recursos/base de datos y codigo de imagen.txt`.
4. Revisa los datos de conexión en `logica/database.php`.
5. Abre `http://localhost/proyectofinal` en el navegador.

## Próximas mejoras

- Usar consultas preparadas en todas las operaciones con la base de datos.
- Guardar las contraseñas con `password_hash` en lugar de texto plano.
- Validar el tipo y el tamaño de las imágenes que se suben.
