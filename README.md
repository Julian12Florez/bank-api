# Instalación

clonar el proyecto

## Requisitos

Para instalar el proyecto es necesario tener mysql,php y composer instalado,
en mysql debe estar la conexion disponible por el puerto 3306

### Comandos

Antes de ejecutar los siguientes comando verificar en el archivo .env.example los datos de conexion a la base de datos, porque seran utilizados desde el primer comando.

  

```bash
1 cp .env.example .env
2 composer install
```


## Acceso
Los usuarios de la aplicación son generados de manera random, para hacer login es necesario ingresar a la base de datos y verificar un número de identificación la contraseña para cualquier usuario es 1234
