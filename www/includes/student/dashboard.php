<?php
$total_absences = count_students_absences();
$total_delays = count_students_delays();
$total_absences_not_justified = count_students_absences_not_justified();
$total_delays_not_justified = count_students_delays_not_justified();
?>

<header>
    <div class="tile is-ancestor" style="margin: 10px;">
        <div class="tile is-parent">
            <article class="tile is-child">
                <article class="message is-light" style="margin-top: 0.5%;">
                    <div class="message-header">
                        <p>Récapitulatif</p>
                        <a class="button is-light" onclick="michel.Consultation.open()">
                            <span class="icon is-small">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span>Détails</span>
                        </a>
                    </div>
                    <div class="message-body">
                        <p>
                            <i class="fas fa-chair fa-sm"></i>
                            <?php
                            if ($total_absences > 0) {
                                ?>
                                Vous avez <strong><?php echo $total_absences ?><?php echo ($total_absences > 1) ? " absences" : " absence"; ?></strong> dont <strong><?php echo $total_absences_not_justified ?><?php echo ($total_absences_not_justified > 1) ? " non justifiées" : " non justifiée"; ?></strong>
                            <?php
                        } else {
                            ?>
                                Vous n'avez <strong>aucune absence</strong>
                            <?php
                        }
                        ?>
                        </p>
                        <p>
                            <i class="fas fa-running fa-sm"></i>
                            <?php
                            if ($total_delays > 0) {
                                ?>
                                Vous avez <strong><?php echo $total_delays ?><?php echo ($total_delays > 1) ? " retards" : " retard"; ?></strong> dont <strong><?php echo $total_delays_not_justified ?><?php echo ($total_delays_not_justified > 1) ? " non justifiés" : " non justifié"; ?></strong>
                            <?php
                        } else {
                            ?>
                                Vous n'avez <strong>aucun retard</strong>
                            <?php
                        }
                        ?>
                        </p>
                    </div>
                </article>
            </article>
        </div>
    </div>
</header>

<div class="tile is-ancestor" style="margin: 10px;">
    <div class="tile is-parent">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Vos dernières absences</p>
                </div>
                <div class="message-body">
                    <div class="tile is-parent is-vertical">
                        <?php
                        $color_status = null;
                        $color_etat = null;
                        $color_controle = null;
                        $delay_tickets = last_absence_ticket();
                        foreach ($delay_tickets as $delay_ticket) {
                            if ($delay_ticket->SIG_TRAITE == 0) {
                                $color_status = "is-danger";
                            } else {
                                $color_status = "is-success";
                            }

                            if ($delay_ticket->SIG_ETAT == "Non justifié") {
                                $color_etat = "is-danger";
                            } else if ($delay_ticket->SIG_ETAT == "Rattrapage") {
                                $color_etat = "is-warning";
                            } else {
                                $color_etat = "is-success";
                            }

                            if ($delay_ticket->COU_CONTROLE == 1) {
                                $color_controle = "is-success";
                            }
                            else {
                                $color_controle = "is-danger";
                            }
                            ?>
                            <div class="tile is-child">
                                <div class="card" style="margin-bottom: 1%;">
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            <span class="tags has-addons" style="margin-right: 10px;">
                                                <span class="tag is-link is-rounded">
                                                    <?php
                                                    if (strtoupper($delay_ticket->SIG_TYPE) == "A") {
                                                        echo "Absence";
                                                    } else {
                                                        echo "Retard";
                                                    }
                                                    ?>
                                                </span>
                                                <span class="tag <?php echo $color_etat ?> is-rounded"><?php echo $delay_ticket->SIG_ETAT; ?></span>
                                                <span class="tag <?php echo $color_status ?> is-rounded">
                                                    <?php
                                                    if ($delay_ticket->SIG_TRAITE == 0) {
                                                        echo "Non traité";
                                                    } else {
                                                        echo "Traité";
                                                    }
                                                    ?>
                                                </span>
                                            </span>
                                            <?php echo $delay_ticket->UTI_PRENOM; ?> <?php echo mb_strtoupper($delay_ticket->UTI_NOM); ?> (<?php echo $delay_ticket->UTI_IDENTIFIANT; ?>)
                                        </p>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="tile is-parent">
                                                <div class="tile is-child">
                                                    <strong>Module : </strong><span class="tag is-success is-rounded" style="margin-left: 10px;"><?php echo $delay_ticket->COU_MODULE; ?></span> <br>
                                                    <strong>Contrôle : </strong>
                                                    <span class="tag <?php echo $color_controle ?> is-rounded">
                                                        <?php
                                                        if ($delay_ticket->COU_CONTROLE == 1) {
                                                            echo "Oui";
                                                        }
                                                        else {
                                                            echo "Non";
                                                        }
                                                        ?>
                                                    </span> <br>
                                                    <strong>Date :</strong><span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo $delay_ticket->SIG_DATE; ?></span> <br>
                                                    <strong>Type de Cours : </strong><span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo strtoupper($delay_ticket->COU_TYPE); ?></span><br>
                                                    <strong>Motif : </strong><?php echo $delay_ticket->SIG_MOTIF; ?><br>
                                                </div>
                                                <div class="tile is-child">
                                                    <strong>Commentaire:<br></strong>
                                                    <div class="control">
                                                        <textarea class="textarea has-fixed-size" rows="3" readonly><?php echo $delay_ticket->SIG_COMMENTAIRE; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </article>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Vos dernièrs retards</p>
                </div>
                <div class="message-body">
                    <div class="tile is-parent is-vertical">
                        <?php
                        $color_status = null;
                        $color_etat = null;
                        $color_controle = null;
                        $delay_tickets = last_delay_ticket();
                        foreach ($delay_tickets as $delay_ticket) {
                            if ($delay_ticket->SIG_TRAITE == 0) {
                                $color_status = "is-danger";
                            } else {
                                $color_status = "is-success";
                            }

                            if ($delay_ticket->SIG_ETAT == "Non justifié") {
                                $color_etat = "is-danger";
                            } else if ($delay_ticket->SIG_ETAT == "Rattrapage") {
                                $color_etat = "is-warning";
                            } else {
                                $color_etat = "is-success";
                            }

                            if ($delay_ticket->COU_CONTROLE == 1) {
                                $color_controle = "is-success";
                            }
                            else {
                                $color_controle = "is-danger";
                            }
                            ?>
                            <div class="tile is-child">
                                <div class="card" style="margin-bottom: 1%;">
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            <span class="tags has-addons" style="margin-right: 10px;">
                                                <span class="tag is-link is-rounded">
                                                    <?php
                                                    if (strtoupper($delay_ticket->SIG_TYPE) == "A") {
                                                        echo "Absence";
                                                    } else {
                                                        echo "Retard";
                                                    }
                                                    ?>
                                                </span>
                                                <span class="tag <?php echo $color_etat ?> is-rounded"><?php echo $delay_ticket->SIG_ETAT; ?></span>
                                                <span class="tag <?php echo $color_status ?> is-rounded">
                                                    <?php
                                                    if ($delay_ticket->SIG_TRAITE == 0) {
                                                        echo "Non traité";
                                                    } else {
                                                        echo "Traité";
                                                    }
                                                    ?>
                                                </span>
                                            </span>
                                            <?php echo $delay_ticket->UTI_PRENOM; ?> <?php echo mb_strtoupper($delay_ticket->UTI_NOM); ?> (<?php echo $delay_ticket->UTI_IDENTIFIANT; ?>)
                                        </p>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="tile is-parent">
                                                <div class="tile is-child">
                                                    <strong>Module : </strong><span class="tag is-success is-rounded" style="margin-left: 10px;"><?php echo $delay_ticket->COU_MODULE; ?></span> <br>
                                                    <strong>Contrôle : </strong>
                                                    <span class="tag <?php echo $color_controle ?> is-rounded">
                                                        <?php
                                                        if ($delay_ticket->COU_CONTROLE == 1) {
                                                            echo "Oui";
                                                        }
                                                        else {
                                                            echo "Non";
                                                        }
                                                        ?>
                                                    </span> <br>
                                                    <strong>Date :</strong><span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo $delay_ticket->SIG_DATE; ?></span> <br>
                                                    <strong>Type de Cours : </strong><span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo strtoupper($delay_ticket->COU_TYPE); ?></span><br>
                                                    <strong>Motif : </strong><?php echo strtoupper($delay_ticket->SIG_MOTIF); ?><br>
                                                </div>
                                                <div class="tile is-child">
                                                    <strong>Commentaire:<br></strong>
                                                    <div class="control">
                                                        <textarea class="textarea has-fixed-size" rows="3" readonly><?php echo $delay_ticket->SIG_COMMENTAIRE; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </article>
        </article>
    </div>
</div>
<div id="Consultation" class="modal">
    <div class="modal-background" onclick="michel.Consultation.close()"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Nom Prénom | Promo - Groupe
            </p>
            <button class="delete" aria-label="close" onclick="michel.Consultation.close()"></button>
        </header>
        <section class="modal-card-body">
            <strong>N°Étudiant : </strong><span class="tag is-primary is-rounded" style="margin-right: 10px;">21800346</span>
            <br><strong>Type : </strong><span class="tag is-warning is-rounded" style="margin-right: 10px;">Absence</span>
            <br><strong>État : </strong><span class="tag is-danger is-rounded" style="margin-right: 10px;">Non Justifié</span>
            <br><strong>Date : </strong><span class="tag is-info is-rounded" style="margin-right: 10px;">16 Juin 2019 - 11h39</span>
            <br><strong>Module : </strong><span class="tag is-dark is-rounded" style="margin-right: 10px;">M2101</span>
            <label class="label">Commentaire du professeur :</label>
            <div class="field">
                <div class="control">
                    <textarea class="textarea" readonly>Ici commentaire du professeur !</textarea>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="file is-succes">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="file-label">
                            Justifier
                        </span>
                    </span>
                    <span class="file-name">
                        Justification.png
                    </span>
                </label>
            </div>
        </footer>
    </div>
</div>