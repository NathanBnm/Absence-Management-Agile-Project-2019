<?php

$utilisateur = get_utilisateur();

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
<nav class="navbar is-fixed-top <?php echo $couleur; ?>" role="navigation" aria-label="main navigation">
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
				<i class="fas fa-chair"></i>
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
					Récapitulatif
				</a>
				<a class="navbar-item <?php echo ($page == "notification") ? "is-active" : ""; ?>" href="index.php?page=notification">
					<i class="fas fa-bell"></i>
					Notifications
				</a>
			<?php
		}
		?>
		</div>
		<div class="navbar-end">
			<a class="navbar-item" href="#" onclick="infobox.information.open()">
				<?php echo $_SESSION['firstname'] . " " . mb_strtoupper($_SESSION['lastname']); ?>
			</a>
			<a href="index.php?page=logout" title="Déconnexion" class="navbar-item">
				<i class="fas fa-power-off fa-lg"></i>
			</a>
		</div>
	</div>
</nav>
<div id="information" class="modal">
	<div class="modal-background" onclick="infobox.information.close()"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">
				Vos Informations
			</p>
			<button class="delete" aria-label="close" onclick="infobox.information.close()"></button>
		</header>
		<section class="modal-card-body">
			<span class="icon is-small"><i class="fas <?php echo $icon; ?>"></i></span>
			<?php
			if ($_SESSION['rank'] == 'ETU') {
				?>
				<strong>N° Étudiant : </strong>
			<?php
		} else {
			?>
				<strong>Identifiant : </strong>
			<?php
		}
		?>
			<span class="tag is-light is-rounded" style="margin-right: 10px;">
				<?php echo $utilisateur['UTI_IDENTIFIANT']; ?>
			</span>
			<br>
			<span class="icon is-small"><i class="fas fa-signature"></i></span>
			<strong>Nom : </strong>
			<span class="tag is-dark is-rounded" style="margin-right: 10px;">
				<?php echo mb_strtoupper($utilisateur['UTI_NOM']); ?>
			</span>
			<br>
			<span class="icon is-small"><i class="fas fa-signature"></i></span>
			<strong>Prénom : </strong>
			<span class="tag is-black is-rounded" style="margin-right: 10px;">
				<?php echo $utilisateur['UTI_PRENOM']; ?>
			</span>
			<br>
			<span class="icon is-small"><i class="fas fa-envelope-open"></i></span>
			<strong>Mail : </strong>
			<span class="tag is-link is-rounded" style="margin-right: 10px;">
				<?php echo $utilisateur['UTI_MAIL']; ?>
			</span>
			<br>
			<?php
			if ($_SESSION['rank'] == 'ETU') {
				?>
				<span class="icon is-small"><i class="fas fa-graduation-cap"></i></span>
				<strong>Groupe : </strong>
				<span class="tag is-info is-rounded" style="margin-right: 10px;">
					TP <?php echo $utilisateur['UTI_GROUPE']; ?>
				</span>
				<br>
				<span class="icon is-small"><i class="fas fa-university"></i></span>
				<strong>Promo : </strong>
				<span class="tag is-primary is-rounded" style="margin-right: 10px;">
					<?php echo $utilisateur['UTI_PROMO']; ?><?php echo ($utilisateur['UTI_PROMO'] == 1) ? "ère année" : "ème année"; ?>
				</span>
			<?php
		}
		?>
		</section>
	</div>
</div>
<script type="text/javascript">
	(function() {
		var burger = document.querySelector('.burger');
		var nav = document.querySelector('#' + burger.dataset.target);
		burger.addEventListener('click', function() {
			burger.classList.toggle('is-active');
			nav.classList.toggle('is-active');
		});
	})();
</script>