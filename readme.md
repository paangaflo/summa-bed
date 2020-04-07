<p align="center"><img src="https://summa-bed.herokuapp.com/images/logo-summa-solutions.png" width="400px" alt="logo"></p>

## Acerca del proyecto

Proyecto que permite administrar compañías y sus respectivos empleados. Manejo CRUM sobre los modelos de Compañías y Empleados.

Este proyecto se presenta como prueba técnica para Summa Solutions.

## Características de implementación

Cuenta con internacionalización de lenguaje, migraciones para generar el modelo de datos y sus respectivos registros; también cuenta con manejo de Bootstrap 4 para generar la maquetación del front-end.

## Demo del proyecto

El demo se encuentra alojado en el siguiente hosting de Heroku:
Para ingresar cree una cuenta en la opción de Register y después ingrese al sitio con la misma cuenta.

[https://summa-bed.herokuapp.com](https://summa-bed.herokuapp.com)

## Instalacion del proyecto

Clonar repositorio:
```shell script
git clone https://github.com/paangaflo/summa-bed.git summa-bed
```
Ingresamos a la carpeta:
```shell script
cd summa-bed
```
Instalamos las dependencias de composer:
```shell script
composer install
```
Instalamos las dependencias de npm:
```shell script
npm install
```
Cree una copia de su archivo .env:
```shell script
cp .env.example .env
```
Genere una llave de encriptación para la app:
```shell script
php artisan key:generate
```
En el archivo .env, agregue información de la base de datos para permitir que Laravel se conecte a la base de datos. Los campos necesarios son los siguientes:
```shell script
DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD and DB_CONNECTION=mysql
```
Ejecute el comando migrate para inicializar la base de datos:
```shell script
php artisan migrate
```
Ejecute el comando migrate –seed  para la inserción de datos sobre la base de datos:
```shell script
php artisan migrate --seed
```
Compilar el proyecto en ambiente DEV:
```shell script
npm run dev
```
Desplegar en local el proyecto:
```shell script
php artisan serve
```
Ingresar en el navegador web a la siguiente ruta:
```shell script
http://127.0.0.1:8000
```

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).