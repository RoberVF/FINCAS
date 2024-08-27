# Sistema de Control Agrario

## Descripción del Proyecto

Este proyecto es una aplicación web diseñada para el control y gestión agraria de fincas. Originalmente desarrollada utilizando el stack MERN (MongoDB, Express.js, React, Node.js), ha sido migrada a una arquitectura basada en PHP, Laravel y FilamentPHP para mejorar el manejo de relaciones en la base de datos, resolver problemas de CORS y optimizar la comunicación entre el backend y el frontend.

### Funcionalidades Principales

- **Gestión de Fincas**: Creación y administración de fincas agrícolas.
- **Control de Producción**: Registro y seguimiento de la producción anual por finca.
- **Sistema de Riego**: Monitoreo y gestión de los sistemas de riego implementados.
- **Tratamientos**: Registro y seguimiento de los tratamientos aplicados a cada finca.
- **Pluviometría**: Sección dedicada al conteo y registro de lluvias.

## Tecnologías Utilizadas

### Versión Actual
- **Backend**: PHP con Laravel
- **Frontend**: FilamentPHP
- **Base de Datos**: MySQL (o la base de datos configurada con Laravel)

### Versión Anterior (MERN Stack)
- **Backend**: Node.js con Express.js
- **Frontend**: React
- **Base de Datos**: MongoDB

## Motivación para la Migración

La decisión de migrar de MERN stack a Laravel y FilamentPHP se basó en los siguientes factores:

1. **Complejidad de Relaciones**: Mejorar el manejo de relaciones complejas entre entidades en la base de datos.
2. **Problemas de CORS**: Eliminar los desafíos relacionados con las políticas de mismo origen (CORS).
3. **Comunicación Backend-Frontend**: Optimizar y simplificar la interacción entre el backend y el frontend.
4. **Desarrollo Rápido**: Aprovechar las capacidades de Laravel y FilamentPHP para un desarrollo más rápido y eficiente.

## Estructura del Proyecto
proyecto/
│
├── app/
│   ├── Http/
│   ├── Models/
│   └── Filament/
│       └── Resources/
│           ├── FincaResource.php
│           ├── ProduccionResource.php
│           ├── RiegoResource.php
│           ├── TratamientoResource.php
│           └── LluviaResource.php
│
├── database/
│   └── migrations/
│
├── resources/
│   └── views/
│
└── routes/
    └── web.php


## Instalación y Configuración

1. Clonar el repositorio
2. Instalar dependencias: `composer install`
3. Configurar el archivo `.env`
4. Ejecutar migraciones: `php artisan migrate`
5. Iniciar el servidor: `php artisan serve`

## Uso

Acceder a la aplicación a través del navegador y utilizar la interfaz de FilamentPHP para gestionar las fincas, producciones, riegos, tratamientos y registros de lluvia.

## Contribución

Las contribuciones son bienvenidas. Por favor, abra un issue para discutir los cambios propuestos antes de realizar un pull request.

## Licencia

[MIT License](https://opensource.org/licenses/MIT)