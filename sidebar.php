<!-- sidebar.html (corrigido) -->
<section id="sidebar">
	<a href="#" class="brand">
		<i class='bx bxs-smile bx-lg'></i>
		<span class="text">Amndgr</span> <!-- puxar o nome do usuario no banco de dados -->
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
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'Analistc' ? 'active' : '')?>">
			<a href="painel.php?page=Analistc">
				<i class='bx bx-calendar-event bx-sm'></i>
				<span class="text">Agendamento</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class='bx bxs-message-dots bx-sm'></i>
				<span class="text">Message</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class='bx bxs-group bx-sm'></i>
				<span class="text">Team</span>
			</a>
		</li>
	</ul>
	<ul class="side-menu bottom">
		<li class="<?php echo (array_key_exists('page', $_GET) && $_GET['page'] == 'config' ? 'active' : '')?>">
			<a href="painel.php?page=config">
				<i class='bx bxs-cog bx-sm bx-spin-hover'></i>
				<span class="text">"config.php"</span>
			</>
		</li>
		<li>
			<a href="index.php" class="logout">
				<i class='bx bx-power-off bx-sm bx-burst-hover'></i>
				<span class="text">Logout</span>
			</a>
		</li>
	</ul>
</section>
