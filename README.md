# Cadastro de Produtos com Validação em PHP

Este projeto é uma aplicação web simples desenvolvida em PHP, HTML5 e MySQL para o cadastro de produtos. Ele realiza validações no lado do servidor para garantir a integridade dos dados antes da inserção no banco de dados.

## 🚀 Funcionalidades

- **Formulário de Cadastro:** Interface em HTML5 para entrada do nome e preço do produto.
- **Validação de Dados:**
  - Verifica se os campos obrigatórios estão preenchidos.
  - Garante que o campo de preço seja numérico e maior que zero.
- **Integração com Banco de Dados:** Conexão nativa via extensão `mysqli` para inserção de registros na tabela `produtos`.
- **Feedback Dinâmico ao Usuário:** Exibe mensagens de sucesso ou erro formatadas e utiliza JavaScript (`setTimeout`) para ocultá-las automaticamente após 5 segundos.

---

## 🛠️ Tecnologias Utilizadas

- **HTML5:** Estruturação do formulário web.
- **PHP:** Processamento dos dados no servidor e validações.
- **MySQL:** Banco de dados relacional para persistência das informações.
- **JavaScript:** Manipulação do DOM para ocultação automática de alertas.

---

## 🗄️ Estrutura do Banco de Dados

Para executar o projeto, crie o banco de dados e a tabela executando o script SQL abaixo no seu MySQL / phpMyAdmin:

```sql
CREATE DATABASE IF NOT EXISTS exercicio;
USE exercicio;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);