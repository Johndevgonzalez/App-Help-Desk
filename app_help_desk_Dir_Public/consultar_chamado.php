<?php require_once "validador_acesso.php" ?>

<?php
  
  //array de chamados
  $chamados = array();

  // abrir o arquivo salvo do abrir chamado  e LER(r) passado no fopen 
  $arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');

  //percorrer as linhas do array salvas no texto
  //enquanto houver registros(linhas) a serem recuperados
  //usar o feof <-- testa pelo fimdo arquivo (end of file)
  while (!feof($arquivo)) { //testa pelo fim de um arquivo / retornando true or false
    //linhas
    $registro = fgets($arquivo); // recuperando cada linha até ser false para sair do while
    $chamados[] = $registro;
  }

  //fechar o arquivo aberto
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <!-- opcao de criacao de link para fazer o logoff -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Sair</a>
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
            <!-- primeiro card da aplicacao -->
            <div class="card-body">

              <!-- percorer o array-->
              <? foreach ($chamados as $chamado) { ?>

                <?php
                  // usar o explode que procura pelo # e substitui pela string
                  $chamado_dados = explode('#', $chamado);
                  //para pular o array que nao contem nada/ 3 pq temos só 3 descricoes
                  
                  //teste de perfil
                  if($_SESSION['perfil_id'] == 2) {
                    // so vamos exibir o chamaod se ele foi criado pelo usuario
                    if($_SESSION['id'] != $chamado_dados[0]) {
                      continue;
                    }
                  }
                  

                  if(count($chamado_dados) < 3) {
                    continue;
                  }

                ?>
                        
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <!-- utilizando a tag de impressao do php -->
                    <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                    <p class="card-text"><?=$chamado_dados[3]?></p>
                  </div>
                </div>

              <? } ?>

                </div>
              </div>

              <div class="row mt-5">
                <div class="col-6">
                  <!-- adicionado o link(a) de volta para home substituindo no botton -->
                    <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>