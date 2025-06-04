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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.5.0/apexcharts.min.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../perfil.css" />

	
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



					$paginasPermitidas = ['home', 'salas', 'agendamento', 'contagem', 'nova_sala', 'adm', 'Perfil'];


				
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
	
	<script src="js/script.js" defer></script>

	<?php if (isset($_GET['page']) && $_GET['page'] === 'agendamento'): ?>
		<script src="js/calendario.js" defer></script>
	<?php endif; ?>

	<script src="js/perfil.js"></script>
		
	<?php
		if (isset($_GET['page']) && in_array($_GET['page'], ['home'])): ?>
			<script src="js/grafico.js"></script>
	<?php endif; ?>

	<?php
		if (isset($_GET['page']) && in_array($_GET['page'], ['adm'])): ?>
			<script src="js/adm.js"></script>
	<?php endif; ?>

	<script src="js/tema.js" defer></script>



</body>
</html>
