<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />	
</head>
<body>
  <center>
    <table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="60%;">
      <tbody>
        <tr>
          <td style="display:block;width:15px" width="15"></td>
          <td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
            <table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr><td style="line-height:20px" colspan="2" height="20"></td></tr>
                <tr>
                  <td colspan="2">
                    <table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td align="center">
                            <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/themes/tramiton/images/logo_tramiton1.png">
                          </td>
                        </tr>
                        <tr style="border-bottom:solid 1px #BFBFBF"><td style="line-height:16px" colspan="2" height="16"></td></tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td width="100%" colspan="2">
                    <table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td align="justify">
                            <p><b><?php echo $model->nombre_usuario; ?></b>, te damos la bienvenida a la Plataforma Tramitón. Para activar tu cuenta y finalizar el registro debes dar click en el siguiente botón:</p>
                          </td>
                        </tr>
                        <tr><td style="line-height:16px" height="16"></td></tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/themes/tramiton/images/robot_mail.png"></td>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <?php
                            $url = Yii::app()->createAbsoluteUrl('site/activarCuenta',array('email' => $model->email, 'codigoVerificacion' => $modelInsertUser->codigoVerificacion));
                          ?>
                          <td align="center"><a href="<?php echo $url; ?>" target="_blank" style="color: #fff; background-color: #C92D2D;border-color: #C92D2D; padding: 6px 12px;border-radius: 8px;font-size: 1.3em; text-decoration: none;">Confirmar</a></td>
                        </tr>
                        <tr><td style="line-height:40px" height="40"></td></tr>
                        <tr>
                          <td align="right">
                            <p>Si necesitas contactarte con nosotros,<br>puedes hacerlo a través de:</p>
                          </td>
                        </tr>
                        <tr><td style="line-height:40px" height="40"></td></tr>
                        <tr>
                          <td align="right">
                            <p><b>02 3934-500 Ext. 419 / 424</b></p>
                            <p><a href="mailto:tramiton@administracionpublica.gob.ec?Subject=Dudas%20Tramiton" target="_top"><b>tramiton@administracionpublica.gob.ec</b></a></p>
                          </td>
                        </tr>
                        <tr><td style="line-height:50px" height="50"></td></tr>
                        <tr>
                          <td align="right">
                            <p>Atentamente<br>Equipo Tramiton</p>  
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr><td style="line-height:20px" colspan="2" height="20"></td></tr>
              </tbody>
            </table>
          </td>
          <td style="display:block;width:15px" width="15"></td>
        </tr>
      </tbody>
    </table>
  </center>
</body>
</html>
