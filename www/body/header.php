<?php
$rank = '';
$couleur = '';
$icon = '';
if ($_SESSION['rank'] == 'ETU') {
	$rank = 'Étudiant';
	$couleur = 'bg-bleu';
	$icon = 'fa-user-graduate';
} else if ($_SESSION['rank'] == 'ENS') {
	$rank = 'Enseignant';
	$couleur = 'bg-orange';
	$icon = 'fa-user';
} else if ($_SESSION['rank'] == 'DIR') {
	$rank = 'Directeur';
	$couleur = 'bg-violet';
	$icon = 'fa-user-tie';
}
?>
<nav class="navbar <?php echo $couleur; ?>" role="navigation" aria-label="main navigation">
	<div id="navbar" class="navbar-menu">
		<div class="navbar-start">
			<p class="navbar-item">
				<i class="fas <?php echo $icon; ?> fa-lg"></i>
				<span class="space-name">Espace <?php echo $rank; ?></span>
			</p>
			<a class="navbar-item" href="index.php?page=dashboard">
				<i class="fas fa-columns"></i>
				Tableau de bord
			</a>
			<a class="navbar-item" href="index.php?page=absences">
				<i class="fas fa-user-slash"></i>
				Absences
			</a>
			<a class="navbar-item" href="index.php?page=delays">
				<i class="fas fa-running"></i>
				Retards
			</a>
			<?php
				if ($_SESSION['rank'] == 'ENS' || $_SESSION['rank'] == 'DIR') {
			?>
				<a class="navbar-item" href="index.php?page=courses">
					<i class="fas fa-book"></i>
					Cours
				</a>
			<?php
				}
			?>
		</div>
		<div class="navbar-end">
			<a class="navbar-item" href="#">
				<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
			</a>
			<a href="index.php?page=logout" title="Déconnexion" class="navbar-item">
				<i class="fas fa-power-off fa-lg"></i>
			</a>
		</div>
	</div>
</nav>