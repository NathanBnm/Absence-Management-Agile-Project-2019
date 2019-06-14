<?php
if(isset($_POST['conf'])) {
    $mail = $_POST['mail'];
    $sujet = $_POST['sujet'];
    $comment = $_POST['comment'];
    var_dump($mail);
    var_dump($sujet);
    var_dump($comment);
    envoie_perso($mail, $sujet, $comment);
    //echo "<meta http-equiv='refresh' content='0'>";
}
?>

<form>
    <div class="tile is-ancestor" style="margin: 10px;">
        <div class="tile is-parent">
            <article class="tile is-child ">
                <article class="message">
                    <div class="message-header">
                        <p>Envoyer une notification</p>
                    </div>
                    <div class="message-body">
                        <div class="field is-vertical">
                            <div class="field-label is-normal">
                                <label class="label">Destinataire :</label>
                            </div>
                            <div class="field-label">
                                <div class="field">
                                    <div class="control">
                                        <input class="input" name="mail" id="mail" type="text" placeholder="ex: ok@mail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="field-label is-normal">
                                <label class="label">Sujet :</label>
                            </div>
                            <div class="field-label">
                                <div class="field">
                                    <div class="control">
                                        <input name="sujet" id="sujet" class="input" type="text" placeholder="ex: Rendu projet absence">
                                        <textarea name="comment" id="comment" class="textarea has-fixed-size" placeholder="Votre Commentaire" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-vertical">
                            <div class="field-label">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button id="conf" name="conf" type="submit" href="#" class="button is-success" aria-haspopup="true">
                                        <span class="icon is-small">
                                            <i class="fas fa-check"></i>
                                        </span>
                                            <span>Confirmer</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </article>
            </article>
        </div>
    </div>
</form>
