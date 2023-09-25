
# Setup Docker Para API de Doação de Sangue


### Passo a passo
Clone Repositório
```sh
git clone https://github.com/odenilsonmarques/app-api-doe-sangue.git
```

Copie os arquivos docker-compose.yml, Dockerfile e o diretório docker/ para o seu projeto
```sh
cp -rf setup-docker-laravel/* app-laravel/
```
```sh
cd app-laravel/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="app-doe-sangue"
APP_URL=http://localhost/8389

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=db_api_doe_sague
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec nome do container bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Acessar o projeto
[http://localhost:8389](http://localhost:8389)
