# DesafioNIS
Desafio em PHP<br>
https://github.com/gabriielvital/Desafio-Php-Nis

## Goals 
<p>
  <br> [ DONE ] Front End Adicionar Cidadão
  <br> [ DONE ] Front End Procurar Cidadao pelo NIS
  <br> [ DONE ] Integração por SQL Strings
  <br> [ DONE ] Arquitetura MVC
  <br> [ - ] Modificar código para uma API
  <br> [ - ] Padrão Interfaces
  <br> [ - ] Padrão Valid
  <br> [ - ] Padrão Single Responsiblity
  <br> [ - ] Configurar Composer
  <br> [ - ] Integração por ORM
  <br> [ - ] Injeção de Dependencias
  <br> [ - ] Adicionar Mascara no NIS
  <br> [ - ] Produzir Testes com PHPUnit
  <br> [ - ] Fazer um Container do projeto pro Docker
</p>

## Description
```
NIS-> Composto por 11 Digitos

Criar aplicação -> Unico campo para informar o nome do cidadão. Assim, ao cadastrar um número NIS deve ser gerado e atribuido à pessoa.
                -> Unico campo para informar o nis. Assim, ao pesquisar o nis informado, deve ser exibido um cidadão caso exista, se não, "Cidadão não encontrado"

->Padrões arquiteturiais e de projeto
->Testes Automatizados
->Gerenciador de Pacotes
```

<h4>Dependencias / Tecnologias</h4>

```
PHP >= 7.2
Composer 2.1
MySQL
Ajax
Javascript
CSS3
HMTL5
```

## How to Start

Instale o Xampp ou Wampp(Ou algum servidor Apache com suporte a linguagens PHP, e um banco de dados MYSql) e cole o conteudo na pasta referente ao htdocs, e importe o squema SQL em Docs/Modelagem.sql no seu servidor MYSql(Lembre-se de verificar se a conexão em App/Database/Database.php está configurado com seu servidor SQL)
