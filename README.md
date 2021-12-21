# PHP coding challenge with Laravel 8<span id="init-doc"></span>
#### Lista de conteúdo:
* [Descrição do desafio](#descrição-do-desafio)
* [Instalação](#installation)
    * [Requisitos do sistema](#installation-requisitos)
        * [PHP e suas extenções](#installation-php-e-suas-extenções)
    * [Via composer](#installation-composer)
    * [Via Docker](#installation-docker)
* [Postman](#postman)
* [Rodando Testes](#testes)
* [Resposta para o desafio](#resposta)
* [Informação bonus "fuzzy search"](#bonus)
* [Problemas?](#issue)
---
## Descrição do desafio<span id="descrição-do-desafio"></span>
Olá esse projeto tem a intenção de mostrar a minha capacidade em trazer uma solução para um desafio proposto.

Recebi como desafio o seguite cenário:

Construir um endpoint REST (de preferência em PHP) que retorne o ranking de um determinado Movemento, trazendo o nome do Movemento e uma lista ordenada com os usuários, seu espectivo recorde pessoal (maior valor), posição e data.

Considerações:
 - Usuários com o mesmo valor de recorde pessoal devem ocupar a mesma posição no ranking.
 - Você pode utilizar um framework ou não.
 - Deve acompanhar as instruções de como rodar o código.
 - O código tem que estar postado em algum repositório Git.
O teste é simples e direto, portanto apresente o que você julga ser um código pronto para produção, seguindo suas melhores práticas de desenvolvimento.
---
## Instalação<span id="installation"></span>

Para esse teste de conhecimento preparei dois modos de testar a solução criada. Poderá rodar a aplicação via docker ou artisan server.

---
### Requisitos do sistema<span id="installation-requisitos"></span>
Enquanto estiver trabalhando e/ou desenvolvendo qualquer aplicação na versão laravel 8. Devemos ter corresponder algumas necessidade do PHP e da configuração do sistema.

Antes de ir para a Instalação do Laravel 8, temos que nos certificar das seguintes configurações.

- Configuração de PHP e Banco de dados
- Composer instalado e configurado em seu ambiente
#### PHP e suas extenções<span id="installation-php-e-suas-extenções"></span>

Aqui estão a versão e as extenções do PHP necessárias para trabalhar com o Laravel 8.
- PHP Version >= 7.3
- BCMath PHP
- Ctype PHP
- Fileinfo PHP
- JSON PHP
- Mbstring PHP
- OpenSSL PHP
- PDO PHP
- Tokenizer PHP
- XML PHP
---
### Instalação via composer<span id="installation-composer"></span>

Clone o projeto para seu ambiente de desenvolvimento
```sh
git clone https://github.com/codigosecafe/coding-challenge-laravel-php.git
```
Acesse a pasta do projeto
```sh
cd coding-challenge-laravel-php/
```
Agora vamos copiar o arquivo **.env.example** eu deixei esse arquivo com as configurações basicas para o funcionamento da aplicação.
```sh
cp .env.example .env
```
Por segurança mantive a chave **APP_KEY** ser valor definido, mas para gerar a chave basta rodar o seguinte comando.
```sh
php artisan key:generate
```
Agora precisamos instalar as dependencias do nosso projeto
```sh
composer install
```
Para esse teste optei por usar o sqlite. mas sintasse a vontade para alterar os dados de conexão no arquivo .env

Agora vamos criar o arquivo **.sqlite** nele que será armazenado nossos registros. Para criar o arquivo basta rodar o seguinte comando
```sh
touch database/database.sqlite
```
O laravel precisa de permissão de escrita em alguns dos seus diretórios, se você estiver configurando um servidor web sugiro ler a documentação do laravel, mas como o teste é local eu defini como legível, gravável e executável (777).

```sh
chmod 777 -R database/database.sqlite storage/ bootstrap/cache/
```
Agora vamos criar a nossa estrutura de tabelas e popular com alguns dados iniciais, rode o reguinte comando.
```sh
php artisan migrate --seed
```
Vamos iniciar o servidor do PHP via artisan
```sh
php artisan serve
```
Se tudo estiver certo no terminal você verá a seguinte mensagem
```sh
Starting Laravel development server: http://127.0.0.1:8000
[Tue Dec 21 01:57:21 2021] PHP 7.4.27 Development Server (http://127.0.0.1:8000) started
```
---
### Instalação via Docker<span id="installation-docker"></span>
Clone o projeto para seu ambiente de desenvolvimento
```sh
git clone https://github.com/codigosecafe/coding-challenge-laravel-php.git
```
Acesse a pasta do projeto
```sh
cd coding-challenge-laravel-php/
```
Agora vamos copiar o arquivo **.env.docker** eu deixei esse arquivo com as configurações basicas para o funcionamento da aplicação.
```sh
cp .env.docker .env
```
Agora vamos iniciar os conteiners do projeto, esse processo pode demorar um pouco.
```sh
docker-compose up -d
```
Para darmos continuidade vamos acessar o conteiner do nosso projeto.
```sh
docker-compose exec coding_challenge_laravel_php bash
```
Por segurança mantive a chave **APP_KEY** ser valor definido, mas para gerar a chave basta rodar o seguinte comando.
```sh
php artisan key:generate
```
Agora precisamos instalar as dependencias do nosso projeto
```sh
composer install
```
O laravel precisa de permissão de escrita em alguns dos seus diretórios, se você estiver configurando um servidor web sugiro ler a documentação do laravel, mas como o teste é em um ambiente controlado eu defini como legível, gravável e executável (777).

```sh
chmod 777 -R storage/ bootstrap/cache/
```
Agora vamos criar a nossa estrutura de tabelas e popular com alguns dados iniciais, rode o reguinte comando.
```sh
php artisan migrate --seed
```
Se tudo estiver certo basta acessar o projeto com o seguinte link
[http://localhost:8989](http://localhost:8989)

---
## Postman <span id="postman"></span>
Adicionei uma pasta chamada **!POSTMAN**, você pode importar os arquivos e testar todos os end-points disponível para API.

---
## Rodando Testes <span id="testes"></span>
Para garantir o funcionamento da nossa aplicação o desenvolvimento dela foi baseada em testes, o meu objetivo foi testes de **FEATURES** e nela eu testei todos os endpoints criados na aplicação.

<img src="./docs/image/route-list.png?raw=true"  />

Para garantir o funcionamento dos testes vamos dar as permições de leitura, escrita e execução (777), em nosso arquivo **sqlite** que usaremos para a armazenar os dados de teste.
```sh
chmod 777 -R database/databasetest.sqlite
```
Agora é cruzar os dedos e rodar os testes, importante passar a frag **--env=testing** para garantir que vamos usar o banco de dados de teste
```sh
php artisan test --env=testing
```
Resultado esperado dos testes

<img src="./docs/image/response-test.png?raw=true"  />

---
 <span id="resposta"></span>
## A solução para o desafio proposto

```sh
curl --location --request GET 'http://127.0.0.1:8000/api/rank-movement/BACK%20SQUAT'
```
Retorno
```json
{
    "data": {
        "movement": "BACK SQUAT",
        "ranked_records": 3,
        "rank": [
            {
                "name_user": "JOAO",
                "position": 1,
                "score": 130,
                "date_time": "2021-01-03 03:00:00",
                "date_time_formated": "03/01/2021 03:00:00"
            },
            {
                "name_user": "JOSE",
                "position": 1,
                "score": 130,
                "date_time": "2021-01-03 03:00:00",
                "date_time_formated": "03/01/2021 03:00:00"
            },
            {
                "name_user": "PAULO",
                "position": 2,
                "score": 125,
                "date_time": "2021-01-03 03:00:00",
                "date_time_formated": "03/01/2021 03:00:00"
            }
        ]
    },
    "success": true,
    "info_app": {
        "date_time": "2021-21-12 07:22:58",
        "app_name": "PHP coding challenge with Laravel 8"
    }
}
```
---

 <span id="bonus"></span>
## Informação Bonus
Para listagem geral de qualquer endpoit "index" usei a técnia de "fuzzy search" basta adicionar como parametro **"searchTerm"** qualquer valor que ele retornará um resultado por aproximação exemplo: **DFT => DEADLIFT** vamos ver isso em execução

```sh
curl --location --request GET 'http://127.0.0.1:8000/api/rank-movement?searchTerm=DFT'
```
Retorno
```json
{
    "data": [
        {
            "movement": "DEADLIFT",
            "ranked_records": 3,
            "rank": [
                {
                    "name_user": "PAULO",
                    "position": 1,
                    "score": 250.3,
                    "date_time": "2021-12-21 00:52:44",
                    "date_time_formated": "21/12/2021 00:52:44"
                },
                {
                    "name_user": "JOSE",
                    "position": 2,
                    "score": 190,
                    "date_time": "2021-01-06 03:00:00",
                    "date_time_formated": "06/01/2021 03:00:00"
                },
                {
                    "name_user": "JOAO",
                    "position": 3,
                    "score": 180,
                    "date_time": "2021-01-02 03:00:00",
                    "date_time_formated": "02/01/2021 03:00:00"
                }
            ]
        }
    ],
    "success": true,
    "info_app": {
        "date_time": "2021-21-12 07:28:52",
        "app_name": "PHP coding challenge with Laravel 8"
    }
}
```
---
## Problemas? <span id="issue"></span>

Sinta-se à vontade para abrir uma `issue` no repositório para qualquer problema ou solicitação de recurso. Para obter detalhes de como enviar sua solicitação, verifique o arquivo [CONTRIBUTING][contributing].

Se entretanto for algo que requer minha atenção iminente, sinta-se à vontade para entrar em contato [codigosecafe+github@gmail.com](codigosecafe+github@gmail.com).

[contributing]:CONTRIBUTING.md
