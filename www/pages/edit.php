<?php
$id = $_GET['id'];
$ticket = fetch_ticket($id);

if ($ticket) {

    if ($ticket['SIG_TRAITE'] == 0) {
        $color_status = "is-danger";
    } else {
        $color_status = "is-success";
    }

    if ($ticket['SIG_ETAT'] == "Non justifié") {
        $color_etat = "is-danger";
    } else if ($ticket['SIG_ETAT'] == "Rattrapage") {
        $color_etat = "is-warning";
    } else {
        $color_etat = "is-success";
    }

    if ($ticket['SIG_TYPE'] == 'A') {
        $page = "absences";
    } else if ($ticket['SIG_TYPE'] == 'R') {
        $page = "delays";
    }

    if (isset($_POST['edit-ticket'])) {
        $message = htmlspecialchars(trim($_POST['message']));

        $errors = [];

        if (empty($message)) {
            $errors['empty'] = "Veuillez saisir un commentaire";
        }

        if (strlen($message) > 255) {
            $errors['invalid-size'] = "Le commentaire ne peut pas dépasser 255 caractères";
        }

        if (empty($errors)) {
            update_message($id, $message);
            header('Location:index.php?page=' . $page);
            exit();
        }
    }

    ?>

    <div class="tile is-ancestor" style="margin: 10px;">
        <div class="tile is-parent">
            <article class="tile is-child ">
                <article class="message">
                    <div class="message-header">
                        <p>Informations sur le billet</p>
                    </div>
                    <div class="message-body">
                        <span class="tags has-addons" style="margin-right: 10px;">
                            <span class="tag is-link is-rounded">
                                <?php
                                if ($ticket['SIG_TYPE'] == "A") {
                                    echo "Absence";
                                } else {
                                    echo "Retard";
                                }
                                ?>
                            </span>
                            <span class="tag <?php echo $color_etat ?> is-rounded"><?php echo $ticket['SIG_ETAT']; ?></span>
                            <span class="tag <?php echo $color_status ?> is-rounded">
                                <?php
                                if ($ticket['SIG_TRAITE'] == 0) {
                                    echo "Non traité";
                                } else {
                                    echo "Traité";
                                }
                                ?>
                            </span>
                        </span>
                        <strong><?php echo $ticket['UTI_PRENOM']; ?>&nbsp;<?php echo mb_strtoupper($ticket['UTI_NOM']); ?>&nbsp;(<?php echo $ticket['UTI_IDENTIFIANT']; ?>)</strong>
                        <br><br>
                        <strong>Module : </strong>
                        <span class="tag is-success is-rounded" style="margin-left: 10px;"><?php echo $ticket['COU_MODULE']; ?></span>
                        <br>
                        <strong>Date :</strong>
                        <span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo $ticket['SIG_DATE']; ?></span>
                        <br>
                        <strong>Type de Cours : </strong>
                        <span class="tag is-info is-rounded" style="margin-left: 10px;"><?php echo strtoupper($ticket['COU_TYPE']); ?></span>
                        <br>
                        <strong>Contrôle :</strong>
                        <span class="tag is-info is-rounded" style="margin-left: 10px;">
                            <?php
                            if ($ticket['COU_CONTROLE'] == 1) {
                                echo "Oui";
                            } else {
                                echo "Non";
                            }
                            ?>
                        </span>
                        <br>
                        <strong>Motif : </strong><?php echo $ticket['SIG_MOTIF']; ?>
                        <br>
                    </div>
                </article>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child">
                <article class="message">
                    <div class="message-header">
                        <p>Éditer le commentaire</p>
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
                    require('includes/forms/edit-ticket.form.php'); ?>
                    </div>
                </article>
            </article>
        </div>
    </div>

<?php

} else {
    header('Location:index.php?page=dashboard');
    exit();
}
