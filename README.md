# 🎓 GradeUp

O **GradeUp** é um sistema web desenvolvido em PHP que permite a gestão de notas e frequências de alunos. Através de uma interface simples e intuitiva, professores e administradores podem cadastrar, editar e visualizar informações acadêmicas, facilitando o acompanhamento do desempenho dos estudantes.

## 🛠️ Tecnologias Utilizadas

* **PHP**: Linguagem de programação utilizada para o desenvolvimento do sistema.
* **MySQL**: Banco de dados para armazenamento das informações.
* **HTML/CSS**: Estruturação e estilização das páginas web.
* **JavaScript**: Interatividade nas páginas.

## 📁 Estrutura do Repositório

* `Config/`: Contém arquivos de configuração do banco de dados.
* `Controller/`: Controladores responsáveis pela lógica de negócios e interação com o banco de dados.
* `Model/`: Modelos que representam as entidades do sistema.
* `View/`: Arquivos responsáveis pela apresentação das informações ao usuário.
* `templates/`: Templates reutilizáveis para as páginas.
* `vendor/`: Dependências do Composer.
* `composer.json`: Arquivo de configuração do Composer.
* `index.php`: Ponto de entrada da aplicação.

## 🚀 Como Executar

1. Clone este repositório:

   ```bash
   git clone https://github.com/Gloterianota349/GradeUp.git
   ```
2. Acesse o diretório do projeto:

   ```bash
   cd GradeUp
   ```
3. Instale as dependências do Composer:

   ```bash
   composer install
   ```
4. Configure o banco de dados no arquivo `Config/database.php`.
5. Inicie o servidor embutido do PHP:

   ```bash
   php -S localhost:8000
   ```
6. Acesse o sistema através do navegador em:

   ```
   http://localhost:8000
   ```

## 📚 Funcionalidades

* **Cadastro de Alunos**: Permite o registro de novos alunos no sistema.
* **Cadastro de Notas**: Facilita o lançamento de notas para cada aluno e disciplina.
* **Cadastro de Frequências**: Registra a presença ou ausência dos alunos nas aulas.
* **Visualização de Desempenho**: Gera relatórios com o desempenho acadêmico dos alunos.
