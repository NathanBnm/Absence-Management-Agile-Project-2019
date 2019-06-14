<form id="edit-ticket" method="POST">
    <div class="field">
        <label class="label">Commentaire :</label>
        <div class="control">
            <textarea class="textarea has-fixed-size" placeholder="Votre commentaire" rows="5" maxlength="255" id="message" name="message"><?php echo $ticket['SIG_COMMENTAIRE']; ?></textarea>
        </div>
        <p id="count" class="help">0 / 255</p>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-success"  id="edit-ticket" name="edit-ticket">
                <span class="icon is-small"><i class="fas fa-check"></i></span>
                <span>Confirmer</span>
            </button>
            <a href="index.php?page=<?php echo $page; ?>" class="button is-danger">
                <span class="icon is-small"><i class="fas fa-ban"></i></span>
                <span>Annuler</span>
            </a>
        </div>
    </div>
</form>