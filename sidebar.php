<!-- sidebar.html (corrigido) -->
<section id="sidebar">
	<a href="#" class="brand">
		<img id="logo" src="<?php echo ($_SESSION['tema'] == 'dark' ? 'img/logo_dark.png' : 'img/logo.png')?>" alt="Logo" style="width: 70px; height: auto; margin-top: 30px;">
		<span class="text"><?php echo $_SESSION['NomeLogin']?></span>
	</a>
	<ul class="side-menu top">
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'home' ? 'active' : '')?>">
			<a href="painel.php?page=home">
				<i class='bx bxs-dashboard bx-sm'></i>
				<span class="text">Início</span>
			</a>
		</li>
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'salas' ? 'active' : '')?>">
			<a href="painel.php?page=salas">
				<i class='bx bx-desktop bx-sm'></i>
				<span class="text">Salas</span>
			</a>
		</li>
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'agendamento' ? 'active' : '')?>">
			<a href="painel.php?page=agendamento">
				<i class='bx bx-calendar-event bx-sm'></i>
				<span class="text">Agendamento</span>
			</a>
		</li>

		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'adm' ? 'active' : '')?>">
				<?php if($_SESSION['idTipoUsuario'] == 1){?>
				<a href="painel.php?page=adm">
				<i class='bx bxs-group bx-sm'></i>
				<span class="text">Usuários</span>
				</a>
				<?php }?>
			
    		
			
		</li>
	</ul>
	<ul class="side-menu bottom">
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'Perfil' ? 'active' : '')?>">
			<a href="painel.php?page=Perfil">
				<i class='bx bxs-cog bx-sm bx-spin-hover'></i>
				<span class="text">Perfil</span>
			</a>
		</li>
		<li>
			<a href="php/logout.php" class="logout">
				<i class='bx bx-power-off bx-sm bx-burst-hover'></i>
				<span class="text">Sair</span>
			</a>
		</li>
	</ul>
</section>
