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
		<form method="dialog">
			<h3>Editar Perfil</h3>
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
			<a href="index.php"><li>Sair</li></a>
		</ul>
	</div>
</nav>
