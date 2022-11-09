## Como rodar a aplicação

- Clone o diretório com git clone 
- Dê a permissão de escrita na pasta storage : <b>php artisan storage:link</b>
- Rode o composer dump-autoload ou composer update
- Instale um banco de dados relacional (Mysql ou MariaDB) com o nome de investidor10.
- Configure esse banco no seu arquivo .env
- Rode o comando <b>php artisan migrate</b>
- Finalmente, rode a mesma com <b>php artisan serve</b>
## Descrições de uso

- A cada alteração do artigo, um histórico é salvo no mesmo. Essas alterações são exibidas quando você entra no artigo.

## Faça seu cadastro

- No software você pode cadastrar acessando o link /register

