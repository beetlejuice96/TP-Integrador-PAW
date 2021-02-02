<h1 align="center">TP-Integrador-PAW</h1>
<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Dependencias
* git
* docker-compose

## Instalación y Ejecución (Development)

* git clone https://github.com/beetlejuice96/TP-Integrador-PAW.git
* cd TP-Integrador-PAW
* composer install o composer install --ignore-platform-reqs
* cp .env.example .env
* Crear una base de datos
* Editar .env con los valores deseados
* Ejecutar migraciones: php artisan migrate
* Ejecutar: php artisan key:generate
* Ejecutar: php artisan serve

## Instalación y Ejecución (Deploy)

* git clone https://github.com/beetlejuice96/TP-Integrador-PAW.git
* cd TP-Integrador-PAW
* cp .env.example .env
* Editar .env con los valores deseados obligatoriamente en APP_URL, DB_CERTIFICATES_PATH, DB_SSLMODE, MAIL_PASSWORD
* Modificar el docker-compose con los valores correspondientes en VIRTUAL_HOST y LETSENCRYPT_HOST.
* Generar y copiar los certificados del cliente de la base de datos en /MechanicSheep/certs (ca.pem, client-cert.pem, client-key.pem) con chmod 777
* docker-compose build app
* Generar y copiar los certificados del servidor de base de datos en /MechanicSheep/docker-compose/mysq/etc/mysql/certs/ (ac.pem, servidor-cert.pem, servidor-key.pem) con chmod 777
* Crear el directorio 'mysql' en ./docker-compose/mysql/var/lib/
* docker-compose up -d


## Vulnerabilidades de seguridad

Si descrubre una vulnerabilidad de seguridad dentro del proyecto, envíe un correo electrónico a MechanicSheep a través de [Renault@MechanicSheep.com.ar](mailto:Renault@MechanicSheep.com.ar). Todas las vulnerabilidades de seguridad se abordarán de inmediato.

## Licencia

El proyecto es un software de código abierto con licencia bajo la [MIT license](https://opensource.org/licenses/MIT).

[comment]: <> ## Documentación

[comment]: <> [DocumentaciónFinal](Documentacion/)

[comment]: <> ## Credenciales 

[comment]: <> ### Rol de usuario administrador

[comment]: <> * admin@admin.com
[comment]: <> * administrador

[comment]: <> ### Rol de usuario moderador

[comment]: <> * mod@mod.com
[comment]: <> * moderador

[comment]: <> Drive del proyecto: https://drive.google.com/drive/folders/1cqZtmRrHaZoF8ttxPow_qxOjWIJQ-ldH?usp=sharing