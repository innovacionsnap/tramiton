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
    public $passWord = 'Innovacion.15';
    
    public function enviarMail(array $remitente, array $destinatario, $asunto, $mensaje){
        
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
        /*echo "remitentes: " . $remitente[0] . " nombre: " . $remitente[1];
        echo "<br>destinos: " . $destinatario[0] . " nombre: " . $destinatario[1];
        echo "<br>asunto: " . $mail->Subject;
        echo "<br>";
        echo "mensaje: <br>" . $mensaje;
        //$mail->Send();
        echo "<br>";*/
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            Yii::app()->end();
        }
        
        
        //
        
        
        
        //tramiton@
        /*
         *  var $cm;
    var $host = 'mail.administracionpublica.gob.ec';
    var $port = 587;
    var $userName = 'concurso.tramitesdeuna@administracionpublica.gob.ec';
    var $passWord = 'Tr@m1t3.2014';
    var $name = 'Concurso';

        //Crear una instancia de PHPMailer
        $mail = new PHPMailer();
        //Definir que vamos a usar SMTP
        $mail->IsSMTP();
        //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
        // 0 = off (producción)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ahora definimos gmail como servidor que aloja nuestro SMTP
        $mail->Host = $this->host;
        //El puerto será el 587 ya que usamos encriptación TLS
        $mail->Port = $this->port;
        //Definmos la seguridad como TLS
        $mail->SMTPSecure = 'tls';
        //Tenemos que usar gmail autenticados, así que esto a TRUE
        $mail->SMTPAuth = true;
        //Definimos la cuenta que vamos a usar. Dirección completa de la misma
        $mail->Username = $this->userName;
        //Introducimos nuestra contraseña de gmail
        $mail->Password = $this->passWord;
        //Definimos el remitente (dirección y, opcionalmente, nombre)
        $mail->From = $this->userName;
        $mail->FromName = $this->name;
        //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
        //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
        $mail->AddAddress($arrayElementos['email'], $datosUsuario[4]);

        //Definimos el tema del email
        $mail->CharSet = "UTF-8";
        $mail->Subject = utf8_decode('Confirmación de Inscripción - Concurso, Convocatoria 2014.');
        //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
        //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
        $mail->MsgHTML($this->mailHTML($tipo_inscripcion, $arrayIntegrantes, $arrayElementos, $llave, $nom_institucion));

        //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) 
        //una versión alternativa en texto plano (también será válida para lectores de pantalla)
        $mail->AltBody = 'This is a plain-text message body';
        //Enviamos el correo
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
        } else {
            echo "Enviado!";
        }

         * 
         * 
         *          */
        
    }
}
