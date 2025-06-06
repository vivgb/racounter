<!-- navbar.html (corrigido) -->
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"  />
	

</head>
<nav>
	<i class='bx bx-menu bx-sm'></i>
	<a href="#" class="nav-link">Categories</a>

	<form action="#">
		<div class="form-input">
			<input type="search" placeholder="Search...">
			<button type="submit" class="search-btn">
				<i class='bx bx-search'></i>
			</button>
		</div>
	</form>

	<input type="checkbox" class="checkbox" id="switch-mode" hidden />
	<label class="swith-lm" for="switch-mode">
		<i class="bx bxs-moon"></i>
		<i class="bx bx-sun"></i>
		<div class="ball"></div>
	</label>

	<!-- Notification Bell -->
	<a href="#" class="notification" id="notificationIcon">
		<i class='bx bxs-bell bx-tada-hover'></i>
		<span class="num">8</span>
	</a>
	<div class="notification-menu" id="notificationMenu">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

	<!-- Profile Menu -->
	<a href="#" class="profile" id="profileIcon">
		<img src="https://placehold.co/600x400/png" alt="Profile">
	</a>
	<dialog id="dialogPerfil" class="dialog-perfil">
		<form method="post" action="php/editarPerfil.php" enctype="multipart/form-data">
			<h3>Editar Perfil</h3>
			<input type="hidden" name="isEdicaoPerfil" value="1">

			<!-- Nome de perfil -->
			<label for="nome">Nome:</label>
			<input type="text" name="nNome" id="nNome" value="<?php echo $_SESSION['NomeLogin'];?>" required>

			<input type="hidden" name="funcao" value="A">
			<input type="hidden" name="id" value="<?php echo $_SESSION['idLogin']; ?>">
			<input type="hidden" name="nTipoUsuario" value="<?php echo $_SESSION['idTipoUsuario']; ?>">
			<input type="hidden" name="nEmail" value=""> <!-- Caso você não queira mudar o e-mail -->
			<input type="hidden" name="nAtivo" value="on"> <!-- Mantém o usuário ativo -->
			<input type="hidden" name="isEdicaoPerfil" value="1"> <!-- Indica que está editando o próprio perfil -->


			<H4>Escolha um icon padrão</H4>
			<div class="icons-guaxinim">
				<img src="img/guaxinim/rac_emo.jpeg" class="icon-option" data-src="img/guaxinim/rac_emo.jpeg">
				<img src="img/guaxinim/rac_coquete.jpeg" class="icon-option" data-src="img/guaxinim/rac_coquete.jpeg">
				<img src="img/guaxinim/rac_swag.jpeg" class="icon-option" data-src="img/guaxinim/rac_swag.jpeg">
				<img src="img/guaxinim/rac_glasses.jpeg" class="icon-option" data-src="img/guaxinim/rac_glasses.jpeg">
				<img src="img/guaxinim/rac_triste.jpeg" class="icon-option" data-src="img/guaxinim/rac_triste.jpeg">
				<img src="img/guaxinim/rac_emo.jpeg" class="icon-option" data-src="img/guaxinim/rac_emo.jpeg">
			</div>
			<div class="botoes-perfil">
				<button type="submit" class="bnt-perfil">Salvar</button>
				<button type="button" class="bnt-perfil" id="fecharDialog">Cancelar</button>
			</div>
		</form>

	</dialog>
	<div class="profile-menu" id="profileMenu">
		<ul>
			<li class="profile-name">
				<div class="profile-wrapper">
					<img src="https://placehold.co/40x40" alt="Foto de perfil" class="profile-icon">
					<div class="camera-icon">
						<i class="bx bx-camera"></i>
						<input type="file" id="fotoPerfil" class="arquivo" name="nFoto">
					</div>
				</div>
				<span class="text"><?php echo $_SESSION['NomeLogin']?></span>
				<i class="fa-solid fa-pen-to-square" id="editaPerfil"></i>
			</li>

			<li><a href="#">Configurações</a></li>
			<a href="php/logout.php"><li>Sair</li></a>
		</ul>
	</div>
</nav>
