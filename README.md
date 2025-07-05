# 👨‍💻 ManexApp – Aplicação Pessoal em PHP

> Sistema pessoal para organização de tarefas, agenda, hábitos e mais — feito com PHP puro, Bootstrap e muito foco no crescimento profissional 🚀

---

## 📌 Visão Geral

**ManexApp** é uma aplicação pessoal para ajudar no controle do dia a dia:  
📅 compromissos, ✅ tarefas, e 🧠 hábitos.  
Desenvolvida com base em boas práticas de organização de código e escalabilidade, ideal para portfólio e estudos de backend.

---

## ⚙️ Tecnologias Utilizadas

- **PHP 8.2**
- **Bootstrap 5.3**
- **MySQL**
- **Chart.js**
- **Composer (phpdotenv)**

---

## 🎯 Funcionalidades

- ✅ Login e Registro de Usuários com sessões
- 🧭 Dashboard com saudação dinâmica
- 📝 CRUD de Tarefas (com status e descrição)
- 🗓️ CRUD de Agenda (com data, hora, título)
- 📊 Gráfico de tarefas concluídas x pendentes
- 🔐 Controle de acesso com `auth.php`
- 🎨 Interface moderna, responsiva, com tema escuro
- 📦 Estrutura modular: `Model`, `Controller`, `View`, `Componentes`

---

## 🗂️ Estrutura de Diretórios

```
/aplicacao-pessoal/
├── index.php                 # Currículo pessoal (home)
├── login.php / register.php # Autenticação
├── dashboard.php            # Tela principal
│
├── /components/             # Partes reutilizáveis (agenda, tarefas, gráfico)
├── /controller/             # Lógica das funcionalidades
├── /model/                  # Interação com banco (PDO)
├── /includes/               # Header, footer, auth
├── /config/                 # Conexão DB + .env
├── /assets/                 # CSS, imagens
```

---

## 🔧 Como Rodar Localmente

### Pré-requisitos:

- PHP 8+
- MySQL
- XAMPP/WAMP/Laragon ou servidor local
- Composer

### Passo a passo:

```bash
# Clone o projeto
git clone https://github.com/seuusuario/aplicacao-pessoal.git
cd aplicacao-pessoal

# Instale dependências (opcional)
composer install
```

### Crie o banco de dados e execute:

```sql
CREATE DATABASE meusistema;

-- Usuários
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  senha VARCHAR(255)
);

-- Tarefas
CREATE TABLE tarefas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  titulo VARCHAR(255),
  descricao TEXT,
  status ENUM('pendente', 'concluida') DEFAULT 'pendente',
  data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Eventos
CREATE TABLE eventos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  titulo VARCHAR(255),
  descricao TEXT,
  data_evento DATE,
  hora_evento TIME,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
```

### Configure o `.env`

Crie o arquivo `config/.env`:

```env
DB_HOST=localhost
DB_NAME=meusistema
DB_USER=root
DB_PASS=
```

Acesse:

```
http://localhost/aplicacao-pessoal
```

---

## 🧠 Autor

**Aldomar Assolin (Manex)**  
👨‍🏭 Ex-soldador | 👨‍🎓 Estudante de ADS  
🎯 Backend com Java, PHP e APIs  
🎸 Rock'n Roll & 🛠️ chão de fábrica  
🔗 [https://www.linkedin.com/in/aldomarassolin](#)  
🔗 [https://github.com/AldomarAssolin](#)

---

## 💡 Futuras Expansões

- [ ] CRUD de Hábitos
- [ ] Exportar dados em PDF ou CSV
- [ ] Dark/Light Toggle
- [ ] Painel com metas diárias
- [ ] Integração com app mobile (API REST)

---

## 📄 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

---

⭐ **Se você gostou do projeto, deixe uma estrela!**
