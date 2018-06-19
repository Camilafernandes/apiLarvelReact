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
```

## Levantar ambiente após configurado

```bash
docker-compose up
```

### Migrations

Você pode executar este comando fora do container PHP, no host:

```bash
docker exec -it apiprodutos_app_1 php artisan migrate
sudo docker exec -it apiprodutos_app_1 php artisan db:seed
```

Observe que o nome do container que roda o PHP pode modificar de acordo com a
sua arquitetura, se for o seu caso, rode um `docker ps` para identificar o nome
correto.


## Testando aplicação

Execute a seguinte requisição:

```bash
curl -d "email=camilasilvafernandes15@gmail.com&password=secret" -X POST http://localhost:8080/api/auth/login
```

E a resposta deverá ser algo como o json que segue

```json
{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hcGkvYXV0aC9sb2dpbiIsImlhdCI6MTUyOTQzMTMzMiwiZXhwIjoxNTI5NDM0OTMyLCJuYmYiOjE1Mjk0MzEzMzIsImp0aSI6Ing4Q3RwOUZ3b3I5UzdCRUEifQ.T0dmZ_7n8OpcWBd4sr64hY9PeIjM9e-YPcD1Cfp-kPg","token_type":"bearer"}

```bash

curl -d "nome=Produto teste1&descricao=teste de descricao de produto&valor_compra=10.00&valor_revenda=20.00&ativo=1&imagem=teste.jpg" -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hcGkvYXV0aC9sb2dpbiIsImlhdCI6MTUyOTQzMTMzMiwiZXhwIjoxNTI5NDM0OTMyLCJuYmYiOjE1Mjk0MzEzMzIsImp0aSI6Ing4Q3RwOUZ3b3I5UzdCRUEifQ.T0dmZ_7n8OpcWBd4sr64hY9PeIjM9e-YPcD1Cfp-kPg" -X POST http://localhost:8080/api/produtos

```

E a resposta deverá ser algo como o json que segue

```json
{"nome":"Produto teste1","descricao":"teste de descricao de produto","valor_compra":"10.00","valor_revenda":"20.00","ativo":"1","imagem":"teste.jpg","updated_at":"2018-06-19 18:16:31","created_at":"2018-06-19 18:16:31","id":1}