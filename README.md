## Requisitos técnicos

* PHP 7^
* Mysql 5.6
* Docker

## Levantar ambiente de desenvolvimento
OBS: Estes passos devem ser feitos antes de executar o primeiro
`docker-compose up`

### Arquivos de configuração

Execute os seguintes comandos:

```bash
cp .env.example .env
cp docker-compose.yml-example docker-compose.yml
composer install
```

## Levantar ambiente após configurado

```bash
docker-compose up -d
```

### Migrations

Você pode executar este comando fora do container PHP, no host:

```bash
docker exec -it apilarvelreact_app_1 php artisan migrate
docker exec -it apilarvelreact_app_1 php artisan db:seed
```

Observe que o nome do container que roda o PHP pode modificar de acordo com a
sua arquitetura, se for o seu caso, rode um `docker ps` para identificar o nome
correto.


## Testando aplicação

Acesse:

```bash
http://localhost:8080
```
Login: camilasilvafernandes15@gmail.com
Senha: secret
