<div class="tile is-ancestor" style="margin: 10px;">
    <div class="tile is-parent">
        <article class="tile is-child ">
            <article class="message">
                <div class="message-header">
                    <p>Ajouter un billet</p>
                </div>
                <div class="message-body">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            ?>
                            <article class="message is-danger">
                                <div class="message-body">
                                    <?php echo $error; ?>
                                </div>
                            </article>
                        <?php
                    }
                }
                require('includes/forms/add-ticket.form.php'); ?>
                </div>
            </article>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Vos derniers billets</p>
                </div>
                <div class="message-body">
                    <div class="tile is-parent is-vertical">
                        <?php
                        $color_status = null;
                        $color_etat = null;
                        $color_controle = null;
                        $tickets = last_ticket();
                        foreach ($tickets as $ticket) {
                            if ($ticket->SIG_TRAITE == 0) {
                                $color_status = "is-danger";
                            } else {
                                $color_status = "is-success";
                            }

                            if ($ticket->SIG_ETAT == "Non justifié") {
                                $color_etat = "is-danger";
                            } else if ($ticket->SIG_ETAT == "Rattrapage") {
                                $color_etat = "is-warning";
                            } else {
                                $color_etat = "is-success";
                            }

                            if ($ticket->COU_CONTROLE == 1) {
                                $color_controle = "is-success";
                            } else {
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
                                                    if (strtoupper($ticket->SIG_TYPE) == "A") {
                                                        echo "Absence";
                                                    } else {
                                                        echo "Retard";
                                                    }
                                                    ?>
                                                </span>
                                                <span class="tag <?php echo $color_etat ?> is-rounded"><?php echo $ticket->SIG_ETAT; ?></span>
                                                <span class="tag <?php echo $color_status ?> is-rounded">
                                                    <?php
                                                    if ($ticket->SIG_TRAITE == 0) {
                                                        echo "Non traité";
                                                    } else {
                                                        echo "Traité";
                                                    }
                                                    ?>
                                                </span>
                                            </span>
                                            <?php echo $ticket->UTI_PRENOM; ?> <?php echo mb_strtoupper($ticket->UTI_NOM); ?> (<?php echo $ticket->UTI_IDENTIFIANT; ?>)
                                        </p>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="tile is-parent">
                                                <div class="tile is-child">
                                                    <strong>Module : </strong><span class="tag is-success is-rounded" style="margin-left: 10px;"><?php echo $ticket->COU_MODULE; ?></span> <br>
                                                    <strong>Contrôle : </strong>
                                                    <span class="tag <?php echo $color_controle ?> is-rounded">
                                                        <?php
                                                        if ($ticket->COU_CONTROLE == 1) {
                                                            echo "Oui";
                                                        } else {
                                                            echo "Non";
                                                        }
                                                        ?>
                                                    </span> <br>
                                                    <strong>Date :</strong><span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo $ticket->SIG_DATE; ?></span> <br>
                                                    <strong>Type de Cours : </strong><span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo strtoupper($ticket->COU_TYPE); ?></span><br>
                                                    <strong>Motif : </strong><?php echo $ticket->SIG_MOTIF; ?><br>
                                                </div>
                                                <div class="tile is-child">
                                                    <strong>Commentaire:<br></strong>
                                                    <div class="control">
                                                        <textarea class="textarea has-fixed-size" rows="3" readonly><?php echo $ticket->SIG_COMMENTAIRE; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columns" style="text-align: center">
                                            <div class="column">
                                                <a href="#" class="button is-link" aria-haspopup="true" onclick="m1.m1_acc.open()">
                                                    <span>Modifier</span>
                                                    <span class="icon is-small">
                                                        <i class="far fa-edit"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="column">
                                                <form method="POST">
                                                    <button type="submit" class="button is-danger" id="delete" name="delete">
                                                        <span>Supprimer</span>
                                                        <span class="icon is-small">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </span>
                                                    </button>
                                                </form>
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