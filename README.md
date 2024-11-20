# Visão Geral

Este projeto visa gerenciar transações financeiras, incluindo as funcionalidades de listar, filtrar, adicionar, editar e apagar transações.

## Tecnologias Utilizadas

 - **Frontend**: Angular e CSS para estilização
 - **Backend**: Laravel 11 com PHP 8.3.13
 - **Banco de Dados**: MySql.

## Estrutura do Projeto

## Backend

O backend foi desenvolvido com Laravel 11, utilizando PHP 8.3.13

### Componentes

Formulário para adicionar ou editar transações.
Lista com todas as transações e opções para editar e deletar.

### Frontend

A parte da estilização foi feita usando Angular 18.2.12 e CSS.

### Componentes

 - **transaction-form**: Formulário para adicionar e editar transações.
 - **transaction-list**: Lista todas as transações com opções para filtrar, criar, editar e excluir.

### Serviços

 - **transaction.service**: Gerencia a comunicação com a API.

### Roteamento
 - **TransacaoFormComponent**: Rota para criar e editar transações.
 - **TransacaoListComponent**: Rota para listar todas as transações.

## Banco de Dados

O banco de dados MySql é utilizado para armazenar as todas as informações das transações.

### Estrutura do Banco de Dados

 - **Tabela cadastrotransacoes**: Armazena o ID, NOME, DATA, TIPO, CATEGORIA e VALOR das transações.

## Configuração do Ambiente

1. **Frontend:**
   - Instale as dependências: `npm install`
   - Inicie o servidor do Angular: `ng serve`

2. **Backend:**
   - Instale as dependências: `composer install`
   - Configure o ambiente: `.env`
   - Crie a tabela do banco de dados pelo php: `php artisan make:model Transaction -m`
   - Execute as migrações: `php artisan migrate`
   - Inicie o servidor do Laravel: `php artisan serve`

3. **Banco de Dados:**
   - Certifique-se de que o MySql está em execução.
   - Crie o banco de dados `create database if not exists financial_transactions`.
   - Configure o acesso ao banco de dados no arquivo `.env` do Laravel.

## Instruções de Uso

 - Iniciar o servidor do Laravel `php artisan serve`
 - Inicie o servidor do Angular: `ng serve` 
 - No navegador de sua preferência acesse `http://localhost:4200/`.
 - Na página de lista você poderá usar as ações de criar, editar ou apagar transações, além de filtrá-las.
 - No formulário de cadastro e edição das transações, preencha os campos necessários.
