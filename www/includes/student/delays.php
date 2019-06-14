<?php
    $total_delays = count_students_delays();
?>

<div class="tile is-ancestor">
    <div class="tile is-parent" style="margin: 20px;">
        <article class="tile is-child">
            <article class="message is-dark">
                <div class="message-header">
                <p>Tous vos billets de retard (<?php echo $total_delays; ?>)</p>
                </div>
                <div class="message-body">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th>État</th>
                                <th>Enseignant</th>
                                <th>Motif</th>
                                <th>Commentaire</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                            <?php
                                $color_etat = null;
                                $retards = list_students_delays();
                                foreach($retards as $retard) {
                                    if($retard->SIG_ETAT == "Non justifié") {
                                        $color_etat = "is-danger";
                                    } else if ($retard->SIG_ETAT == "Rattrapage"){
                                        $color_etat = "is-warning";
                                    } else{
                                        $color_etat = "is-success";
                                    }
                            ?>
                            <tr>
                                <th>
                                    <?php echo $retard->COU_MODULE; ?>
                                </th>
                                <td>
                                    <span class="tag <?php echo $color_etat ?> is-rounded">
                                        <?php echo $retard->SIG_ETAT; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="uppercase">
                                        <?php echo "Récupérer nom du prof" ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $retard->SIG_MOTIF; ?>
                                </td>
                                <td>
                                    <?php echo $retard->SIG_COMMENTAIRE; ?>
                                </td>
                                <td>
                                    <?php echo $retard->SIG_DATE; ?>
                                </td>
                                <td>
                                    <a class="button is-primary" onclick="michel.Consultation.open()" title="Visualiser">
                                        <span class="icon is-small">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
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
            <br><strong>Type : </strong><span class="tag is-warning is-rounded" style="margin-right: 10px;">retard</span>
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
            <div class="file is-success">
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
<div id="information" class="modal">
    <div class="modal-background" onclick="michel2.information.close()"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Vos Informations !
            </p>
            <button class="delete" aria-label="close" onclick="michel2.information.close()"></button>
        </header>
        <section class="modal-card-body">
            <span class="icon is-small">
                <i class="fas fa-user-graduate"></i>
            </span></i><strong>N°Étudiant : </strong><span class="tag is-light is-rounded" style="margin-right: 10px;">21800346</span>
            <br><strong>Nom : </strong><span class="tag is-dark is-rounded" style="margin-right: 10px;">Michel</span>
            <span class="icon is-small">
                <i class="fas fa-signature"></i>
            </span></i><br><strong>Prénom : </strong><span class="tag is-black is-rounded" style="margin-right: 10px;">Jacquie</span>
            <span class="icon is-small">
                <i class="fas fa-signature"></i>
            </span></i><br><strong>Mail : </strong><span class="tag is-link is-rounded" style="margin-right: 10px;">21800346@unicaen</span>
            <span class="icon is-small">
                <i class="fas fa-envelope-open"></i>
            </span></i><br><strong>Groupe : </strong><span class="tag is-info is-rounded" style="margin-right: 10px;">TP 2.2</span>
            <span class="icon is-small">
                <i class="fas fa-graduation-cap"></i>
            </span></i><br><strong>Promo : </strong><span class="tag is-primary is-rounded" style="margin-right: 10px;">1ère année</span>
            <span class="icon is-small">
                <i class="fas fa-university"></i>
            </span></i>
        </section>
        <footer class="modal-card-foot">
            <strong>Vous êtes un étudiant</strong>
        </footer>
    </div>
</div>