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
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
	<link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet' />
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png" />
	<link rel="manifest" href="/site.webmanifest" />

	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css" />

	<title>Raccounter</title>
</head>
<body>

	<?php include 'sidebar.php'; ?>
	
 
	<section id="content">
		<main id="main-content" class="secao">
			<?php include 'navbar.php'; ?>
			<?php
				if (isset($_GET['page'])) {
					$pagina = basename($_GET['page']); // remove caminhos perigosos
				
					// Lista de páginas permitidas



					$paginasPermitidas = ['home', 'salas', 'config', 'agendamento' ];


				
					if (in_array($pagina, $paginasPermitidas)) {
						include "paginas/{$pagina}.php";
					} else {
						echo "<p>Página não encontrada.</p>";
					}
				} else {
					include 'paginas/home.php';
				}
			?>
		</main>

	</section>
	
	<script src="js/script.js"></script>
	<script src="js/calendario.js"></script>
</body>
</html>
