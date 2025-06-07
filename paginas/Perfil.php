<script>
  const idLogin = <?php echo json_encode($_SESSION['idLogin']); ?>;
</script>


<style>
.perfil-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center; 
    padding: 20px;
}

.perfil-card {
    background-color: #fcf4dc;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 20px 25px;
    width: 600px; 
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s;
    word-wrap: break-word;
    overflow-wrap: break-word;
}



.perfil-card h3 {
    margin: 0 0 10px;
    font-size: 18px;
    color: #333;
}

.perfil-card p {
    margin: 4px 0;
    color: #666;
    font-size: 14px;
}


/* Título principal */
.main-title {
  text-align: center;
  font-weight: 700;
  font-size: 2.4rem;
  color: #290b05;
  margin-bottom: 2rem;
  letter-spacing: 1px;
}

/* Título de seções */
.section-title {
  font-size: 1.4rem;
  font-weight: 600;
  color: #6c4434;
  margin-bottom: 1rem;
  border-bottom: 2px solid #3c1209;
  padding-bottom: 0.3rem;
}

/* Sessões */
h2 {
  margin-bottom: 2.5rem;
}

/* Caixas de informação */
.info-box {
  background: #d5c1ac;
  border-radius: 8px;
  padding: 1rem;
  margin-bottom: 1rem;
}

.info-text {
  font-size: 1rem;
  color: #333;
}
.info-box p {
    word-wrap: break-word;
    overflow-wrap: break-word;
    max-width: 100%;
    font-size: 15px;
    line-height: 1.4;
}

.img-box {
  background: #d5c1ac;
  border-radius: 8px;
  padding: 1rem;
  margin-bottom: 1rem;
}

.img-text {
  font-size: 1rem;
  color: #333;
}


.icons-guaxinim {
	display: flex;
	gap: 10px;
	flex-wrap: wrap; 
	justify-content: center;
	padding: 10px;
}

.icon-option {
	width: 120px;
	height: 120px;
	border-radius: 50%; 
	object-fit: cover;  
	cursor: pointer;   
	border: 2px solid transparent; 
	transition: border 0.2s ease;
}

.icon-option:hover {
	border-color: #555; 
}


/* Grupos de campos */
.field-group,
.password-group {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  margin-bottom: 1.5rem;
  align-items: center;
  justify-content: space-between;
  flex-direction: row;
}

.field-label,
.password-group label {
  font-weight: 600;
  font-size: 1rem;
  color: #6c4434;
  flex: 1;
  min-width: 180px;
}

input[type="password"],
input[type="email"],
select,
.password-group input {
  flex: 1 1 250px;
  padding: 0.5rem 1rem;
  border-radius: 6px;
  border: 1.8px solid #fcf4dc;
  font-size: 1rem;
  transition: border-color 0.3s ease;
}

input:focus,
select:focus {
  outline: none;
  border-color: #947364;
  box-shadow: 0 0 6px rgba(148, 115, 100, 0.6);
}


.bnt-editperfil{
  padding: 0.5rem 1.8rem;
  background-color: #6c4434;
  border: none;
  border-radius: 6px;
  color: white;
  font-size: 1rem;
  cursor: pointer;
  font-weight: 600;
  transition: background-color 0.3s ease;
  flex-shrink: 0;
  align-self: center;
}
.submit-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 20px; /* opcional, só pra dar respiro */
}


.bnt-editperfil:hover{
  background-color: #3c1209;
}

/* Checkbox */
.checkbox-label {
  display: flex;
  align-items: center;
  cursor: pointer;
  color: #555;
  font-weight: 600;
  font-size: 1rem;
}

.checkbox-label input[type="checkbox"] {
  margin-right: 0.8rem;
  width: 18px;
  height: 18px;
  cursor: pointer;
}

/* Mensagens */
.msg {
  margin-top: 0.5rem;
  font-weight: 600;
}

.error-msg {
  color: #d32f2f;
}

/* Foto de perfil */
/* Container circular grande */
.profile-wrapper {
  position: relative;
  width: 140px;
  height: 140px;
  overflow: hidden;
  border-radius: 50%;
  cursor: pointer;
  border: 3px solid #947364;
}

.profile-photo {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 2rem;
}


/* Imagem dentro do círculo */
.profile-icon {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 50%;
  transition: transform 0.3s ease;
}

.profile-icon:hover {
  transform: scale(1.05);
}

/* Câmera flutuante */
.camera-icon {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40%; /* ocupa a parte inferior */
  background: rgba(0,0,0,0.5);
  border-bottom-left-radius: 50%;
  border-bottom-right-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
}

.camera-icon i {
  color: #fff;
  font-size: 20px;
}

/* Input file invisível mas funcional */
.camera-icon input[type="file"] {
  position: absolute;
  width: 100%;
  height: 100%;
  cursor: pointer;
  top: 0;
  left: 0;
}

/* Responsividade */
@media (max-width: 580px) {
  .field-group,
  .password-group {
    flex-direction: column;
    align-items: flex-start;
  }

  input[type="password"],
  input[type="email"],
  select,
  .password-group input,
  button,
  .password-button {
    width: 100%;
    margin-top: 0.5rem;
  }

}
</style>

<div class="perfil-container">
  <section class="perfil-card">
      <center><h1>Perfil do Usuário</h1></center>
        <form id="formPerfil" method="POST" enctype="multipart/form-data" action="salvarUsuario.php">

          <div class="profile-photo">
            <div class="profile-wrapper">
              <!-- Aqui é onde a imagem será exibida -->
              <img id="photo" class="profile-icon" src="img/guaxinim/default.jpeg" alt="Foto de perfil">
              
              <div class="camera-icon">
                <i class="bx bx-camera"></i>
                <input type="file" id="fotoPerfil" class="arquivo" name="nFoto" accept="image/*">
              </div>
            </div>
          </div>
          

          
          <div  class="img-box" aria-labelledby="personalDataTitle">
            <center><h1 id="personalDataTitle ">Ou selecione uma foto</h1></center>
            <div class="icons-guaxinim">
              <img src="img/guaxinim/rac_emo.jpeg" class="icon-option" data-src="img/guaxinim/rac_emo.jpeg">
              <img src="img/guaxinim/rac_coquete.jpeg" class="icon-option" data-src="img/guaxinim/rac_coquete.jpeg">
              <img src="img/guaxinim/rac_swag.jpeg" class="icon-option" data-src="img/guaxinim/rac_swag.jpeg">
              <img src="img/guaxinim/rac_glasses.jpeg" class="icon-option" data-src="img/guaxinim/rac_glasses.jpeg">
              <img src="img/guaxinim/rac_triste.jpeg" class="icon-option" data-src="img/guaxinim/rac_triste.jpeg">
              <img src="img/guaxinim/rac_emo.jpeg" class="icon-option" data-src="img/guaxinim/rac_emo.jpeg">
            </div>
          </div>
          <div  class="info-box" aria-labelledby="personalDataTitle">
            <center><h1 id="personalDataTitle">Dados Pessoais</h1></center>
        <p class="info-text"><strong>Nome:</strong><?php echo $_SESSION["NomeLogin"]?></p>
        <p class="info-text"><strong>Email:</strong><?php echo $_SESSION["E-mailLogin"]?></p>
      </div>
      
      <div class="submit-wrapper">
        <button type="submit" class="bnt-editperfil">Salvar Alterações</button>
      </div>
      
    </form>
  </section>
</div>
