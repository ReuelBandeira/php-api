# Laravel Medical Backend

Backend em PHP com Laravel para gerenciamento de médicos e pacientes.

## Estrutura Modular

O projeto segue uma estrutura modular onde cada recurso (médicos e pacientes) tem seu próprio conjunto de arquivos:

```
app/Modules/
├── Doctor/
│   ├── Controllers/
│   ├── DTOs/
│   ├── Repositories/
│   ├── Seeders/
│   └── Services/
└── Patient/
    ├── Controllers/
    ├── DTOs/
    ├── Repositories/
    ├── Seeders/
    └── Services/
```

## Requisitos

-   PHP >= 8.1
-   Composer
-   PostgreSQL
-   Git

## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/medical-backend.git
cd medical-backend
```

2. Instale as dependências:

```bash
composer install
```

3. Configure o ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo `.env`:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=medical
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

5. Execute as migrations e seeders:

```bash
php artisan migrate
php artisan db:seed
```

## Executando o Projeto

Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

O backend estará disponível em http://localhost:8000

## API Endpoints

### Médicos (Doctors)

-   **Listar todos os médicos**

    -   `GET /api/doctors`

-   **Obter médico específico**

    -   `GET /api/doctors/{id}`

-   **Criar novo médico**

    -   `POST /api/doctors`
    -   Dados necessários:
        ```json
        {
            "name": "Nome do Médico",
            "phone": "Telefone",
            "email": "email@exemplo.com",
            "password": "senha",
            "type": "Especialidade"
        }
        ```

-   **Atualizar médico**

    -   `PUT /api/doctors/{id}`
    -   Dados a atualizar (todos opcionais):
        ```json
        {
            "name": "Novo Nome",
            "phone": "Novo Telefone",
            "email": "novo@exemplo.com",
            "type": "Nova Especialidade"
        }
        ```

-   **Excluir médico**
    -   `DELETE /api/doctors/{id}`

### Pacientes (Patients)

-   **Listar todos os pacientes**

    -   `GET /api/patients`

-   **Obter paciente específico**

    -   `GET /api/patients/{id}`

-   **Criar novo paciente**

    -   `POST /api/patients`
    -   Dados necessários:
        ```json
        {
            "name": "Nome do Paciente",
            "age": 35
        }
        ```

-   **Atualizar paciente**

    -   `PUT /api/patients/{id}`
    -   Dados a atualizar (todos opcionais):
        ```json
        {
            "name": "Novo Nome",
            "age": 36
        }
        ```

-   **Excluir paciente**
    -   `DELETE /api/patients/{id}`

## Estrutura do Projeto

-   **Controllers**: Controladores que recebem as requisições e retornam as respostas
-   **DTOs**: Objetos de transferência de dados para validar e transportar dados
-   **Repositories**: Camada de acesso a dados
-   **Services**: Contém a lógica de negócio dividida em operações específicas (Create, Get, Update, Delete)
-   **Seeders**: Dados iniciais para o banco de dados

## Docker (Opcional)

O projeto inclui configuração para Docker. Para executar usando Docker:

```bash
docker-compose up -d
```

## Testes

Para executar os testes:

```bash
php artisan test
```

## Visualizar iamgem

```bash
http://localhost:8000/storage/{file_path}
```

## Licença

[MIT](https://opensource.org/licenses/MIT)
