# Sistema de Gestão Empresarial — Laravel + Livewire + MySQL
## 📋 Descrição Geral

Este projeto foi desenvolvido como parte de um teste prático para Desenvolvedor Full Stack, com o objetivo de criar um sistema de gestão completo para um grupo econômico que possui várias bandeiras, unidades e colaboradores.

O sistema permite cadastrar, consultar e gerenciar todas essas entidades, além de gerar relatórios, realizar exportações em Excel, manter uma auditoria completa das ações e garantir segurança com autenticação de usuários.


## ⚙️ Tecnologias Utilizadas

| Camada       | Tecnologias                                           |
| ------------ | ----------------------------------------------------- |
| **Backend**  | PHP 8+, Laravel 10, MySQL                             |
| **Frontend** | Blade, Tailwind CSS, Livewire                         |
| **Ambiente** | Docker, Docker Compose                                |
| **Extras**   | Laravel Excel, Auditoria, Autenticação Laravel Breeze |

## 🚀 Funcionalidades :
### 🔐 Autenticação

- Login, registro e recuperação de senha.

- Middleware auth protege todas as rotas internas.

- Somente usuários autenticados acessam o sistema.

### 🧩 CRUDs

1. Grupo Econômico

- Criar, visualizar, editar e excluir grupos econômicos.

- Validação de campos obrigatórios.

2. Bandeira

- Cadastramento de bandeiras vinculadas a grupos econômicos.

- Listagem e atualização dinâmica.

3. Unidade

- Cadastro de unidades associadas a uma bandeira.

- Validação de CNPJ e informações obrigatórias.

4. Colaborador

- Cadastro de colaboradores vinculados a uma unidade.

- Relatório completo com filtros.


### 📊 Relatórios

- Relatório detalhado de colaboradores.

- Filtros por nome, unidade, bandeira, etc.

### 📦 Exportação Excel

- Exportação de dados de grupos, bandeiras, unidades e colaboradores.

- Usando o pacote Maatwebsite/Laravel-Excel.

### 🕵️ Auditoria

- Registro automático de todas as ações realizadas.

- Armazena data, hora e usuário responsável.

## ⚙️ Passos para Rodar o Projeto :



```
# Clonar o repositório
git clone https://github.com/seuusuario/sistema-gestao.git
cd sistema-gestao

# Copiar o arquivo de ambiente
cp .env.example .env

# Ajustar as variáveis de conexão do banco no .env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=gestao
DB_USERNAME=root
DB_PASSWORD=password

```

## 🚀 Subir o ambiente

```
# Construir e iniciar os containers
docker-compose up -d --build

# Instalar dependências do Laravel
docker exec -it app composer install

# Gerar chave da aplicação
docker exec -it app php artisan key:generate

# Rodar migrações
docker exec -it app php artisan migrate

# Instalar dependências do frontend
docker exec -it app npm install

# Compilar assets
docker exec -it app npm run dev

```

## Iniciar a Aplicação

```
# Rodar o Backend
php artisan serve

# rodar o Frontend
npm run dev
```

### Acesse o sistema em:
- http://127.0.0.1:8000


# 🔑 Login e Segurança :

- O sistema exige login para todas as rotas internas (/dashboard, /grupos, /bandeiras, etc.).

- Usuários não autenticados são redirecionados automaticamente para /login.

- Sessões seguras controladas por middleware auth.

# 🧾 Fluxo de Uso :

- Cadastrar Grupo Econômico.

- Adicionar Bandeiras ao grupo.

- Cadastrar Unidades para cada bandeira.

- Registrar Colaboradores associados às unidades.

-  Gerar relatórios e exportações Excel.
  
- Consultar auditoria de ações.


  
## 🎥 Demonstração do Projeto

[![Assista ao vídeo de demonstração](https://img.youtube.com/vi/gQft9uG8qi4/hqdefault.jpg)](https://youtu.be/gQft9uG8qi4)






  
