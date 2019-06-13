<?php


function envoie($mail){

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }


    $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
    $message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";

    $boundary = "-----=" . md5(rand());

    $sujet = "Absence";

    $header = "From: \"EXPEDITEUR\"noreply@unicaen.fr".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message .= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========

    mail($mail,$sujet,$message,$header);
}


?>