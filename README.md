# Gestão de Tarefas (To-Do List) - Laravel 12

Este é um projeto de **Gestão de Tarefas** (To-Do List) implementado com **Laravel 12**, **Blade Template Engine**, **Bootstrap 5** e **Autenticação com Laravel Breeze**. Ele permite que os usuários criem, editem, excluam e concluam tarefas, além de filtrar as tarefas por status e visualizar uma lista paginada.

## Funcionalidades

- **Autenticação de Usuários**:
  - Cadastro e login de usuários.
  - Cada usuário tem acesso apenas às suas próprias tarefas.

- **CRUD de Tarefas**:
  - **Criar** novas tarefas.
  - **Listar** tarefas com título, descrição, status (Pendente ou Concluída) e data de criação.
  - **Editar** tarefas existentes.
  - **Excluir** tarefas.
  - **Marcar** tarefas como "Concluída" alterando o status.

- **Filtros e Paginação**:
  - Filtrar tarefas por **status** (Pendente, Concluída).
  - Paginação de tarefas para melhorar a performance.

## Tecnologias Usadas

- **Backend**: Laravel 12
- **Frontend**: Blade Template Engine + Bootstrap 5
- **Banco de Dados**: Postgress
- **Autenticação**: Laravel Breeze
- **Versionamento**: Git (GitHub)

## Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas em sua máquina:

- **PHP** (versão 8.1 ou superior)
- **Composer**
- **Node.js** e **NPM**
- **MySQL** ou **SQLite**

## Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/todo-app.git
cd todo-app

## Instale as dependências
composer install
npm install
npm run dev
Configure o arquivo .env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=emanuel
DB_USERNAME=teste_todoapp
DB_PASSWORD=123emanuel

#Rode as Migrations e Seeders
php artisan migrate --seed
# Inicie o servidor
php artisan serve