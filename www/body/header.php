<?php
$rank = '';
$couleur = '';
$icon = '';
if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ETU') {
	$rank = 'Étudiant';
	$couleur = 'bg-bleu';
	$icon = 'fa-user-graduate';
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ENS') {
	$rank = 'Enseignant';
	$couleur = 'bg-orange';
	$icon = 'fa-user';
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR') {
	$rank = 'Directeur';
	$couleur = 'bg-violet';
	$icon = 'fa-user-tie';
}
?>
<nav class="navbar <?php echo $couleur; ?>" role="navigation" aria-label="main navigation">
	<div id="navbar" class="navbar-menu">
		<div class="navbar-start">
			<a class="navbar-item">
				<i class="fas <?php echo $icon; ?> fa-lg"></i>
				<span class="space-name">Espace <?php echo $rank; ?></span>
			</a>
			<div class="navbar-item has-dropdown is-hoverable">
				<a class="navbar-link has-dropdown">
					<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
				</a>
				<div class="navbar-dropdown is-left">
					<a class="navbar-item">
						Mes Informations
					</a>
				</div>
			</div>
			<a class="navbar-item">
				Accueil
			</a>
			<a class="navbar-item">
				Absences
			</a>
			<a class="navbar-item">
				Retards
			</a>
		</div>
		<div class="navbar-end">
			<a href="index.php?page=logout" title="Déconnexion" class="navbar-item">
				<i class="fas fa-power-off fa-lg"></i>
			</a>
		</div>
	</div>
</nav>