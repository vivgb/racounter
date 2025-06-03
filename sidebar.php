<!-- sidebar.html (corrigido) -->
<section id="sidebar">
	<a href="#" class="brand">
		<img id="logo" src="img/logo.png" alt="Logo" style="width: 70px; height: auto; margin-top: 30px;">
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
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'graficos' ? 'active' : '')?>">
			<a href="painel.php?page=graficos">
			<i class='bx bx-bar-chart-alt-2 bx-sm'></i>
			<span class="text">Graficos</span>
			</a>
		</li>
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'adm' ? 'active' : '')?>">
			<a href="painel.php?page=adm">
				
				<i class='bx bxs-group bx-sm'></i>
				<span class="text">Adm</span>
			</a>
		</li>
	</ul>
	<ul class="side-menu bottom">
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'config2' ? 'active' : '')?>">
			<a href="painel.php?page=config2">
				<i class='bx bxs-cog bx-sm bx-spin-hover'></i>
				<span class="text">Configurações</span>
			</a>
		</li>
		<li>
			<a href="index.php" class="logout">
				<i class='bx bx-power-off bx-sm bx-burst-hover'></i>
				<span class="text">Logout</span>
			</a>
		</li>
	</ul>
</section>
