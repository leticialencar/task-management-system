<p align="center">
  <img src="https://iili.io/KOOMLYX.png" alt="Task Management System Logo" width="180"/>
</p>

<h1 align="center">Nuvra App</h1>
<p align="center">Sistema simples de gerenciamento de tarefas, desenvolvido com Laravel. Permite criar, editar, excluir e acompanhar o progresso de tarefas, com autenticação de usuários e uma interface moderna.</p>    

<br>

## Tecnologias utilizadas

- **PHP 8.4**
- **Laravel 12**
- **MySQL 8**
- **Nginx**
- **Composer**
- **Docker & Docker Compose**
- **Tailwind CSS (frontend)**
- **Blade Templates**

<br>

## Requisitos

Para rodar o projeto com Docker:

- **Docker**  
- **Docker Compose** 

> Não é necessário ter PHP, MySQL ou Nginx instalados localmente.

<br>

## Como rodar o projeto

### 🐳 Usando Docker (recomendado)

> Ideal para testes técnicos ou ambientes padronizados.  
> Nenhuma dependência precisa ser instalada além do Docker.

#### 🧾 Passos:

1. **Clone o repositório**
   ```bash
   git clone https://github.com/leticialencar/task-management-system.git
   cd task-management-system

2. **Copie o arquivo de ambiente**
    ```bash
    cp .env.example .env
    
3. **Verifique o arquivo .env** <br>
   Certifique-se de que estas variáveis estão assim:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=myapp_db
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=root

4. **Suba os containers**
    ```bash
    docker-compose up -d --build

5. **Acesse o container da aplicação**
    ```bash
    docker exec -it myapp bash
    
6. **Gere a key do Laravel**
    ```bash
    php artisan key:generate

7. **Execute as migrações**
    ```bash
    php artisan migrate
    
8. **Acesse no navegador**
    ```bash
    http://localhost:8080

<br>

##  Dicas úteis

* Para parar os containers:

  ```bash
  docker-compose down
  ```

* Para verificar se estão rodando:

  ```bash
  docker ps
  ```

* Para limpar e reconstruir tudo:

  ```bash
  docker-compose down -v --rmi all --remove-orphans
  docker-compose up -d --build
  ```

<br>

## Dica de performance

Se o projeto estiver lento em sua máquina (principalmente no Windows), verifique:

* Se o **antivírus** não está escaneando as pastas do Docker.
* Se os **volumes do WSL2** estão em modo otimizado.
* Evite abrir muitos containers simultaneamente.
