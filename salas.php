<?php
  session_start();
  include ("funcao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas</title>
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">

	<title>Raccounter</title>
    </head>
    <body>
      <!--Salas-->

      <div class="cards-wrapper">
        <div class="sala-card">
          <div class="card-icon">
            <box-icon name='desktop'></box-icon>
            <box-icon name='dots-vertical-rounded'></box-icon>
            
          </div>
          <p class="sala-nome">Sala 1</p>   <!--adicionar opçao de renomear-->
          <div class="buttons">
            <div class="button outlined">Configurações</div>
            <div class="button filled">Ver</div>
          </div>
        </div>
        
        <div class="sala-card">
          <div class="card-icon">
            <box-icon name='desktop'></box-icon>
            <box-icon name='dots-vertical-rounded'></box-icon>
            
          </div>
          <p class="sala-nome">Sala 2</p>  <!--adicionar opçao de renomear-->
          <div class="buttons">
            <div class="button outlined">Configurações</div>
            <div class="button filled">Ver</div>
          </div>
        </div>
        
        <div class="sala-card">
          <div class="card-icon">
            <box-icon name='desktop'></box-icon>
            <box-icon name='dots-vertical-rounded'></box-icon>
            
            
            <!--Exemplo-->
          </div>
                <p class="sala-nome">A201</p>  <!--adicionar opçao de renomear-->
                <p class="quantidade-de-pessoas">12/30</p> <!--deve puxar a quantidade do banco de dados-->
                <div class="buttons">
                  <div class="button outlined">Configurações</div> <!--fornecer acesso a configuracoes padroes e exclusivas dependendo da autorizaçao do usuario-->
                  <div class="button filled">Ver</div> <!--visao geral da sala "como se a visse de cima"(Nao é prioridade)-->
                </div>
              </div>
              
              
            </div>
          </main>
              


	<script src="js/script.js"></script>
    
</body>
</html>

