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

## 🚀 Funcionalidades
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

## ⚙️ Passos para Rodar o Projeto



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


