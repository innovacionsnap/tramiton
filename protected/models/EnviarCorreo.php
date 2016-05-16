<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnviarCorreo
 *
 * @author Oscar
 */
Yii::import('application.extensions.phpmailer.JPhpMailer');

class EnviarCorreo {

    public $host = 'mail.administracionpublica.gob.ec';
    public $port = 587;
    public $userName = 'tramiton@administracionpublica.gob.ec';
    public $passWord = 'Tramiton.2016';

    public function enviarMail(array $remitente, array $destinatario, $asunto, $mensaje) {

        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $this->userName;
        $mail->Password = $this->passWord;
        $mail->SetFrom($this->userName, $remitente[1]);
        $mail->Subject = $asunto;
        $mail->MsgHTML($mensaje);
        $mail->AddAddress($destinatario[0], $destinatario[1]);
        /* echo "remitentes: " . $remitente[0] . " nombre: " . $remitente[1];
          echo "<br>destinos: " . $destinatario[0] . " nombre: " . $destinatario[1];
          echo "<br>asunto: " . $mail->Subject;
          echo "<br>";
          echo "mensaje: <br>" . $mensaje;
          //$mail->Send();
          echo "<br>"; */
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            Yii::app()->end();
        }
    }

}
