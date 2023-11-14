# Bienvenido a la API de Play Games 🙌🕹️

![21z](https://github.com/frankYanez/api-php/assets/103048012/9074b0c0-a060-4e1e-af1f-a7deb08a790e)

Este proyecto es la 3era Parte del Trabajo Practico Especial para la materia WEB 2.

Es una api creada para el ABM de nuestra plataforma de juegos digitales.

Te daremos una breve descripcion de como poder usarla para crear, modificar, actualizar y/o eliminar juegos/desarrolladores

¿Preparado?  

¡Aqui vamos!🚀





## -API Referencia-



## JUEGOS 🎮

![MLHp](https://github.com/frankYanez/api-php/assets/103048012/3bca5cd5-4190-44e4-a3fc-1ac671c12034)


#### Obtener un Juego

```http
  GET /api/games/:ID
```
  EJEMPLO: GET /api/games/102
#### Obtener todos los juegos

```http
  GET /api/games

```


#### Obtener todos los juegos ordenados (default):
```http 
  GET /api/games/order=asc
```

#### Obtener todos los juegos ordenados de manera descendente:
```http
  GET /api/games/order=desc
```
#### Ordenar por campo (valor default : id):
```http
  GET /api/games/field=nombre
  GET /api/games/field=genero
  GET /api/games/field=desarrollador_id
  GET /api/games/field=año_lanzamiento
```
EJEMPLO:
Para ordenar de manera descendente por nombre:
GET /api/games?order=desc&field=nombre


#### Obtener todos los juegos filtrando un campo determinado:

```http
  GET /api/games/filterBy=nombre
  GET /api/games/filterBy=genero
  GET /api/games/filterBy=desarrollador_id
  GET /api/games/filterBy=año_lanzamiento
 ```
 EJEMPLO:
Para ordenar de manera descendente por nombre:
GET /api/games?filterBy=genero&filterValue=accion

#### Obtener los resultados limitados:
```http
GET /api/games?limit=10
```
#### Obtener resultados omitidos
```http
GET /api/games?offset=accion
```
#### Crear un Juego
```http 
POST /api/games
Enviar el cuerpo del Juego por POST
EJEMPLO :
    {
        "nombre": "Warcraft",
        "genero": "Estrategia",
        "desarrollador_id": 1,
        "año_lanzamiento": "2005"
    }
```
#### Actualizar un Juego
```http 
PUT /api/games/:ID
(Enviar el cuerpo del Juego por POST)
EJEMPLO: PUT /api/games/105
Raw en el Body:
    {
        "nombre": "Warcraft",
        "genero": "Estrategia",
        "desarrollador_id": 1,
        "año_lanzamiento": "2005"
    }

```
#### Eliminar un Juego
```http
DELETE /api/games/:ID
```
EJEMPLO: DELETE /api/games/105



## DESARROLLADORES 👨‍💻

![CkxA](https://github.com/frankYanez/api-php/assets/103048012/89e5348e-31df-4f2d-a6bc-bf89b5da9f44)


#### Obtener un Desarrollador

```http
  GET /api/desarrolladores/:ID
```
  EJEMPLO: GET /api/desarrolladores/102

#### Obtener todos los Desarrollador

```http
  GET /api/desarrolladores

```

#### Crear un Desarrollador
```http 
POST /api/desarrolladores
(Enviar el cuerpo del Desarrollador por POST)
EJEMPLO:
    {
        "nombre": "CD Projekt",
        "sede": "Varsovia, Polonia",
        "año_fundacion": 1994,
        "propietario": "Marcin Iwinski y MichalKiciński
    }
```
#### Actualizar un Desarrollador
```http 
PUT /api/desarrolladores/:ID
(Enviar el nuevo cuerpo del  Desarrollador por POST)
EJEMPLO: PUT /api/desarrolladores/105
Raw en el Body:
    {
        "nombre": "CD Projekt",
        "sede": "Varsovia, Polonia",
        "año_fundacion": 1994,
        "propietario": "Marcin Iwinski y MichalKiciński
    }
```
#### Eliminar un Desarrollador
```http
DELETE /api/desarrolladores/:ID
```
EJEMPLO: DELETE /api/desarrolladores/105






  ## Autores
  ![PzBc](https://github.com/frankYanez/api-php/assets/103048012/cb12eef2-07d6-4dbe-a9d0-4fd39a2db5aa)

- [Frank Yanez](https://github.com/frankYanez)
- [Alexis Ivanoff](https://github.com/frankYanez)
