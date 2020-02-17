<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

$body = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
                <td>
                    <tr>
                        <td width='500'>Nome:$nome</td>
                    </tr>
                    <tr>
                        <td width='320'>E-mail:<b>$email</b></td>
                    </tr>
                    <tr>
                        <td width='320'>Telefone:<b>$telefone</b></td>
                    </tr>
                    <tr>
                        <td width='320'>Mensagem:$mensagem</td>
                    </tr>
                </td>
            </tr>  
            <tr>
                <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
            </tr>
        </table>
    </html>
  ";


$emailenviar = "ricardo.vallejo@consulgas.com.br";
$destino = $emailenviar;
$assunto = "Contato ConsulGas";

$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: $nome <$email>';

$enviaremail = mail($destino, $assunto, $body, $headers);
if($enviaremail){
$msg = "Olá, tudo bem?
        <br />
        Obrigado por enviar uma mensagem para gente! Em breve, entraremos em contato.
        <br />
        Abraços!
        <br />
        At.te,";

echo json_encode(array("status" => true, "mensagem" => $msg));

} else {
$msg = "ERRO AO ENVIAR E-MAIL!";
echo json_encode(array("status" => true, "mensagem" => $msg));
}
 ?>