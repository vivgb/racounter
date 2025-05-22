      <!--Salas-->

      <?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}
?>


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
      
              


    

