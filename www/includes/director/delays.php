<div class="tile is-ancestor">
    <div class="tile is-parent" style="margin: 20px;">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Tous vos billets de retard</p>
                </div>
                <div class="message-body">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th>Type</th>
                                <th>État</th>
                                <th>N°Étudiant</th>
                                <th>Étudiant</th>
                                <th>Enseignant</th>
                                <th>Motif</th>
                                <th>Commentaire</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                            <?php
                            $color = null;
                            $color_etat = null;
                            $color_controle = null;
                            $retards = list_director_delays();
                            foreach($retards as $retard) {
                                if($retard->SIG_TRAITE == 0) {
                                    $color = "is-danger";
                                } else {
                                    $color = "is-success";
                                }

                                if($retard->SIG_ETAT == "Non justifié") {
                                    $color_etat = "is-danger";
                                } else if ($retard->SIG_ETAT == "Rattrapage"){
                                    $color_etat = "is-warning";
                                } else{
                                    $color_etat = "is-success";
                                }

                                if ($retard->COU_CONTROLE == 1) {
                                    $color_controle = "is-success";
                                }
                                else {
                                    $color_controle = "is-danger";
                                }

                                ?>
                                <tr>
                                    <td>
                                        <strong><?php echo $retard->COU_MODULE; ?></strong>
                                    </td>
                                    <td>
                                        <?php echo strtoupper($retard->COU_TYPE); ?>
                                    </td>
                                    <td>
                                        <span class="tag <?php echo $color_controle ?> is-rounded">
                                            <?php
                                            if ($retard->COU_CONTROLE == 1) {
                                                echo "Oui";
                                            }
                                            else {
                                                echo "Non";
                                            }
                                            ?>
                                        </span> <br>
                                    </td>
                                    <td>
                                        <span class="tag <?php echo $color_etat ?> is-rounded"><?php echo $retard->SIG_ETAT; ?></span>
                                    </td>
                                    <td>
                                        <?php echo $retard->UTI_IDENTIFIANT; ?>
                                    </td>
                                    <td>
                                        <span class="uppercase">
                                            <?php echo $retard->UTI_NOM; ?>
                                        </span>
                                        <?php echo $retard->UTI_PRENOM; ?>
                                    </td>
                                    <td>
                                        <span class="uppercase">
                                            <?php echo $retard->UTI_ENS_NOM; ?>
                                        </span>
                                        <?php echo $retard->UTI_ENS_PRE; ?>
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
                                        <form method ="POST">
                                            <input type="hidden" value="<?php echo $retard->SIG_CODE; ?>" id="coder" name="coder">
                                            <button type="submit" id="traite" name="traite" href="#" class="button <?php echo $color; ?> is-rounded">
                                                <?php
                                                if($retard->SIG_TRAITE == 0) {
                                                    echo "Non traité";
                                                } else {
                                                    echo "Traité";
                                                }
                                                ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" value="<?php echo $retard->SIG_CODE; ?>" id="code" name="code">
                                            <button type="submit" href="#" class="button is-info" aria-haspopup="true" onclick="abs.Modif_retard.open()">
                                                <span class="icon is-small">
                                                    <i class="far fa-edit"></i>
                                                </span>
                                            </button>
                                            <button type="submit" class="button is-danger" id="delete" name="delete">
                                                <span class="icon is-small">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            </button>
                                        </form>
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
<div class="modal" id="Modif_absence">
    <div class="modal-background" onclick="abs.Modif_absence.close()"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Nom Prénom | Promo - Groupe
            </p>
            <button class="delete" aria-label="close" onclick="abs.Modif_absence.close()"></button>
        </header>
        <section class="modal-card-body">
            <strong>N°Étudiant : </strong><span class="tag is-primary is-rounded" style="margin-right: 10px;">21800346</span>
            <br><strong>Type : </strong><span class="tag is-warning is-rounded" style="margin-right: 10px;">Absence</span>
            <br><strong>Motif : </strong><textarea class="textarea has-fixed-size" placeholder="Motif" rows="1"></textarea>
            <br><strong>État : </strong><span class="tag" style="margin-right: 10px;">
                <div class="select is-danger is-rounded">
                    <select>
                        <option>Non Justifié</option>
                        <option>Justifié</option>
                    </select>
                </div>
            </span>
            <br><strong>Date : </strong><span class="tag is-info is-rounded" style="margin-right: 10px;">16 Juin 2019 - 11h39</span>
            <br><strong>Module : </strong><span class="tag is-success is-rounded" style="margin-right: 10px;">M2101</span>
            <label class="label">Commentaire :</label>
            <div class="field">
                <div class="control">
                    <textarea class="textarea has-fixed-size" placeholder="Le Commentaire dans la base" rows="5"></textarea>
                </div>
                <p class="help">
                    X caractères restants
                </p>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="field is-grouped">
                <div class="control">
                    <a class="button is-success" aria-haspopup="true">
                        <span class="icon is-small">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Confirmer</span>
                    </a>
                </div>
                <div class="control">
                    <a class="button is-danger" aria-haspopup="true">
                        <span class="icon is-small">
                            <i class="fas fa-ban"></i>
                        </span>
                        <span>Annuler</span>
                    </a>
                </div>
            </div>
        </footer>
    </div>
</div>