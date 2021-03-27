<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" href="./assets/logo.png">

    <style>

      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
      
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="./assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Help Desk - Logo">
        Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">

              <!-- Para fazer com que o formulário html se comunique com o servidor primeiro utilizamos na tag form, o "action" -->

              <!-- Utilizando o método post, os dados recebidos do formulário, não ficam na url, e sim em network, do devtools -->
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <!-- Aqui criamos dois blocos php embutidos, e só executará o html entre eles, caso a condição do if for satisfeita -->

                <? if (isset($_GET['login']) && isset($_GET['login']) == 'erro') { ?>

                  <div class="text-danger font-weight-bold">
                    <p>Usuário ou senha inválido(s).</p>
                  </div>

                <? } ?>

                <? if (isset($_GET['login']) && isset($_GET['login']) == 'erro2') { ?>

                  <div class="text-danger font-weight-bold">
                    <p>Faça login antes de acessar as páginas protegidas.</p>
                  </div>

                <? } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>

            </div>
          </div>
        </div>
    </div>
  </body>
</html>