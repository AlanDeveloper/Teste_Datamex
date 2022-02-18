# Teste_Datamex

Siga os passos para rodar o projeto!

## Front-end

Apenas necessário abrir o arquivo "index.html", caso prefira é possível utilizar a extensão Live Server.

## Back-end

Tenha o mysql rodando na sua máquina além do PHP e Composer instalados.

Crie um banco de dados chamado "datamex" e para utilizar o projeto é necessário na pasta "back-end" rodar os comandos:

```
> composer install
> composer migrate-up
> composer start
```

OBS: Caso prefira poderá copiar o arquivo "schema.sql" e colar diretamente no próprio banco de dados, invés de utilizar o comando "composer migrate-up".