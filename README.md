# Projeto de Cadastro de Pessoas (Agenda)

## Como rodar o projeto?

1.  Execute o comando composer install para instalar as dependências do projeto.

    ```bash
    composer install
    ```

2.  Configure seu arquivo .env com as informações do seu banco de dados. Certifique-se de definir o nome do banco de dados, o nome de usuário e a senha de acordo com suas configurações locais.

3.  Gere uma chave de aplicativo com o comando php artisan key:generate. Isso é necessário para segurança da aplicação.

    ```bash
    php artisan key:generate
    ```

4.  Execute as migrações para criar a estrutura do banco de dados com o comando php artisan migrate.

    ```bash
    php artisan migrate
    ```

    ### <b>OBS: Se preferir, o arquivo do banco de dados está na pasta do projeto (schedule.sql)</b>

5.  Opcionalmente, se você tiver um seeder chamado ContactSeeder que popula a tabela de contatos, você pode rodar o seeder com o comando php artisan db:seed --class=ContactSeeder.

    ```bash
     php artisan db:seed --class=ContactSeeder.
    ```

6.  Finalmente, inicie o servidor de desenvolvimento com o comando php artisan serve. Isso iniciará o servidor na porta padrão (geralmente 8000) e você poderá acessar o projeto em seu navegador através do endereço http://localhost:8000 (ou outra porta, se especificada).
    ```bash
    php artisan serve
    ```
