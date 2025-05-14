<?php
session_start();
if (!isset($_SESSION['logado'])) {
	header("Location: index.php");
	exit;
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">


	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">

	<title>Raccounter</title>
</head>
<body>

	<?php include 'sidebar.php'; ?>
	


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
	<nav>
		<i class='bx bx-menu bx-sm' ></i>
		<a href="#" class="nav-link">Categories</a>
		<form action="#">
			<div class="form-input">
				<input type="search" placeholder="Search...">
				<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
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
			<i class='bx bxs-bell bx-tada-hover' ></i>
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
			<img src="https://placehold.co/600x400/png" alt="Profile"> <!--puxar a foto de perfil do usuario-->
		</a>
		<div class="profile-menu" id="profileMenu">
			<ul>
				<li><a href="#"><!--nome do Usuario-->></a></li>
				<li><a href="#">configuracoes</a></li>
				<li><a href="#">sair</a></li>
			</ul>
		</div>
	</nav>
<!-- NAVBAR -->
	<?php
		if (isset($_GET['page'])) {
			$pagina = $_GET['page'];
			if ($pagina == "salas"){
				include "paginas/salas.php";
			}
		} else {
			include "paginas/home.php"; // ou algum conteúdo padrão
		}
	?>

		
	

	
	  
	
	<script src="js/script.js"></script>
</body>
</html>