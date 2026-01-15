# Sistema de Inventario - Proyecto Laravel

Este proyecto implementa un sistema de gestión de inventarios desarrollado en Laravel, cumpliendo con los requerimientos técnicos solicitados para la evaluación.

## Requerimientos Implementados

- **Gestión de Productos (CRUD Full)**: Funcionalidad completa para registrar, ver, editar y eliminar productos.
- **Control de Stock**: Gestión de la cantidad disponible por producto, incluyendo validación para evitar stock negativo.
- **Patrón Arquitectónico MVC**:
    - **Modelo**: `App\Models\Product`
    - **Vista**: Blade templates en `resources/views/products/`
    - **Controlador**: `App\Http\Controllers\ProductController`
- **Rutas CRUD**: Uso de `Route::resource` para una definición de rutas estándar y limpia.
- **Buenas Prácticas**:
    - Validación de datos en el servidor (`ProductController`).
    - Organización modular del código siguiendo los estándares de Laravel.
    - Uso de migraciones para el control de versiones de la base de datos.
- **Interfaz de Usuario**: Interfaz moderna y responsiva con un sistema de temas (oscuro/claro) y acentos premium.

## Tecnologías Utilizadas
- **Laravel Framework**: Lógica de negocio y arquitectura.
- **Blade**: Motor de plantillas para el frontend.
- **Bootstrap 5**: Estilizado responsivo.
- **MySQL**: Base de datos para el almacenamiento de información.
- **Vanilla CSS**: Sistema de personalización de temas mediante variables.

## Instrucciones de Instalación

1. Clonar el repositorio.
2. Ejecutar `composer install`.
3. Configurar el archivo `.env` con las credenciales de la base de datos.
4. Ejecutar las migraciones: `php artisan migrate`.
5. Iniciar el servidor: `php artisan serve`.
