<p align="center">

  <h2 align="center">ZVShop</h2>
  
  <p align="center"><img src="https://i.imgur.com/HljME6ub.png" alt="Logo"></p>

  <p align="center">Una plataforma para la gesti贸n, compra y venta de productos online (demo)</p>
</p>

### Pre-requisitos 馃搵

- PHP >= 8.0
- mysql >= 8.0
- redis
- Composer >= 2.0
- node >= 12.0
- meilisearch


### Instalaci贸n con Laravel Sail 馃敡

1. Ejecutar comando `sail up -d`

2. Copiar el archivo `.env.example` incluido en uno de nombre `.env` y completar variables faltantes (pasarela, servicio de imagenes IMGUR, smtp etc.)

3. Ejecutar comando `sail php artisan migrate:fresh --seed` 

4. Instalar paquetes de node `sail npm install && sail npm run prod`

5. Ejecutar pruebas `sail php artisan test`

6. A帽adir al crontab: `* * * * * php /raiz_del_proyecto/artisan schedule:run >> /dev/null 2>&1`

7. Ejecutar proceso para consumo de trabajos encolados: `sail php artisan queue:work`

8. Acceder al sitio `http://localhost`



## Credeniales de admin. 馃攽

Email|Password|
 ------ | ------ |
admin@gmail.com|password



## API REST-ful

- La API REST-ful implementa la especificaci贸n [json-api](https://jsonapi.org/).  
- Permite la gesti贸n de productos a trav茅s de la API REST-ful.
- La ruta base: http://localhost/api/v1

### Autentificaci贸n desde la API

- Genere el bearer token asi:

 ```js
    axios.post('http://localhost/api/v1/login', {
      email: 'admin@mail.com',
      password: 'password'
    })
    .then(response => console.log(response.data))
    .catch(err => console.log(err.message))
 ```

- Ejemplo de obtenci贸n de todos los productos
 ```js
    axios.get('http://localhost/api/v1/products', {}, {
      headers: {
        Authorization: 'Bearer ' + token_api
      }
    })
    .then(response => console.log(response.data))
    .catch(err => console.log(err.message))
 ```

------------------------
## License

**ZVShop** es un proyecto bajo la licencia [MIT license](https://opensource.org/licenses/MIT).
