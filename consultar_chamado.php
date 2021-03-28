<!-- Importação do script validador de acesso -->
<? require_once 'validador_acesso.php'; ?>

<?php

  // Array que irá conter os chamados:
  $chamados = [];
  
  // Agora que já estamos escrevendo os novos chamados em um arquivo.text, agora precisaremos exibir essas informações no script consultar chamado, e para isso vamos:
  // Abrir o arquivo.txt
  $arquivo = fopen('arquivo.txt', 'r');

  // Agora iremos recuperar as infomrações contidas no arquivo.txt, iremos percorrer utilizando um while, isso pois enquanto houver registros(linhas) a serem recuperados, iremos executar uma lógica:

  while (!feof($arquivo)) { // Utilizando o feof, percorreremos o arquivo até o seu fim, até a ultima linha

    // A inteligência do fgets, faz com que seja recuperado exatamente o que estiver na determinada linha na hora da execução:
    $registro = fgets($arquivo);

    // Atribuindo cada um dos registros aos índices do array chamados:
    $chamados[] = $registro;
  };

  // E sempre lembrar de finalizar esse fluxo do fopen:
  fclose($arquivo);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" href="./assets/logo.png">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="./assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Help Desk
      </a>
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">
            SAIR
          </a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <!-- Para cada chamado irá ser criado um novo card -->
              <? foreach ($chamados as $chamado) { ?>

              <?php 

                // Armazenando os dados do chamado em um array
                $chamado_dados = explode('-', $chamado);

                // Caso os dados do chamado sejam menor que 3, a aplicação ignora
                if(count($chamado_dados) < 3) {
                  continue;
                };

              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_dados[0] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[1] ?></h6>
                  <p class="card-text"><?= $chamado_dados[2] ?></p>

                </div>
              </div>

              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block">
                    Voltar
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>