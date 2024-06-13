# DesafioNIS
Desafio em PHP<br>
https://github.com/gabriielvital/Desafio-Php-Nis<br>
<br>
Existe duas Branchs:<br>
a branch Main com o código monolitico, com arquitetura MVC e conexão com Banco de Dados em PDO, já pronto.<br>
a branch API Version, onde eu estou passando esse código para uma API, e assim colocar posteriormente Dessign Patterns, Testes, etc . <br>
Não fiz uma API de começo porque não tinha feito API em PHP, então resolvi fazer já codar do jeito que eu já sabia em PHP, posteriormente estudando e aplicando conceitos que eu já conheço de outras linguagens nessa versão API.

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

- Suba um servidor apache php na pasta que você extraiu os arquivos, eu utilizei esse comando
```
php -S localhost:8888 -t public
```

- Importe o squema SQL em Docs/Modelagem.sql no seu servidor MYSQL(Lembre-se de verificar se a conexão em App/Database/Database.php está configurado com seu servidor MYSQL)
