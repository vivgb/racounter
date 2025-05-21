<!-- navbar.html (corrigido) -->
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
	<div class="profile-menu" id="profileMenu">
		<ul>
			<li><a href="#">Nome do Usuário</a></li>
			<li><a href="#">Configurações</a></li>
			<li><a href="#">Sair</a></li>
		</ul>
	</div>
</nav>
