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
    <div class="navbar-brand">
        <span class="navbar-burger burger" data-target="navMenu">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </div>
	<div id="navbar" class="navbar-menu">
		<div class="navbar-start">
			<p class="navbar-item">
				<i class="fas <?php echo $icon; ?> fa-lg"></i>
				<span class="space-name">Espace <?php echo $rank; ?></span>
			</p>
			<a class="navbar-item <?php echo ($page == "dashboard") ? "is-active" : ""; ?>" href="index.php?page=dashboard">
				<i class="fas fa-columns"></i>
				Tableau de bord
			</a>
			<a class="navbar-item <?php echo ($page == "absences") ? "is-active" : ""; ?>" href="index.php?page=absences">
				<i class="fas fa-user-slash"></i>
				Absences
			</a>
			<a class="navbar-item <?php echo ($page == "delays") ? "is-active" : ""; ?>" href="index.php?page=delays">
				<i class="fas fa-running"></i>
				Retards
			</a>
			<?php
				if ($_SESSION['rank'] == 'DIR') {
			?>
				<a class="navbar-item <?php echo ($page == "resume") ? "is-active" : ""; ?>" href="index.php?page=resume">
                    <i class="fas fa-clipboard-list"></i>
					Billets
				</a>
			<?php
				}
			?>
		</div>
		<div class="navbar-end">
			<a class="navbar-item" href="#" onclick="michel2.information.open()">
				<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
			</a>
			<a href="index.php?page=logout" title="Déconnexion" class="navbar-item">
				<i class="fas fa-power-off fa-lg"></i>
			</a>
		</div>
	</div>
</nav>
<script type="text/javascript">
    (function() {
        var burger = document.querySelector('.burger');
        var nav = document.querySelector('#'+burger.dataset.target);
        burger.addEventListener('click', function(){
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
        });
    })();
</script>