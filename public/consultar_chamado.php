<!-- Importação do script validador de acesso -->
<? require_once 'validador_acesso.php'; ?>

<?php

  // Array que irá conter os chamados:
  $chamados = [];
  
  // Agora que já estamos escrevendo os novos chamados em um arquivo.txt, agora precisaremos exibir essas informações no script consultar chamado, e para isso vamos:

  // Abrir o arquivo.txt
  $arquivo = fopen('arquivo.txt', 'r');

  // Agora iremos recuperar as infomrações contidas no arquivo.txt, iremos percorrer utilizando um while, isso pois enquanto houver registros(linhas) a serem recuperados, iremos executar uma lógica:

  while (!feof($arquivo)) { // Utilizando o feof, percorreremos o arquivo até o seu fim, até a ultima linha

    // A inteligência do fgets, faz com que seja recuperado exatamente o que estiver na determinada linha na hora da execução:
    $registro = fgets($arquivo);

    //explode dos detalhes do registro para verificar o id do usuário responsável pelo cadastro
    $registro_detalhes = explode('-', $registro);

    //(perfil id = 2) só vamos exibir o chamado, se ele foi criado pelo usuário
    if($_SESSION['perfil_id'] == 2) {

      //se usuário autenticado não for o usuário de abertura do chamado então não faz nada
      if($_SESSION['id'] != $registro_detalhes[0]) {
        continue; //não faz nada

      } else {
        $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
      }

    } else {
      $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
    }

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

    <link rel="icon" href="../assets/logo.png">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <?php include_once("../src/menu_home.php"); ?>

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
                  <!-- Exibindo as informações de cada índice na tag html -->
                  <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <p class="card-text"><?= $chamado_dados[3] ?></p>

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