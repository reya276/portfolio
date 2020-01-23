<?php
//Send emails to mail clients
//required fields
$sentCheck = isset($_POST["sentCheck"]) ? $_POST["sentCheck"] : 0;
if(isset($_POST["sentCheck"]) == 1){
  $first_name = isset($_POST["name"]) ? $_POST["name"] : NULL;
  $email = isset($_POST["email"]) ? $_POST["email"] : NULL;

  //Optional fields
  if ($_POST["company"] == NULL){
    $company = "None";
  }else{
    $company = isset($_POST["company"]) ? $_POST["company"] : NULL;
  }
  if ($_POST["phone"] == NULL) {
    $phone = "None";
  }else{
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : NULL;
  }
  $inq1 = isset($_POST["inq1"]) ? $_POST["inq1"] : NULL;
  $inq2 = isset($_POST["inq2"]) ? $_POST["inq2"] : NULL;
  $inq3 = isset($_POST["inq3"]) ? $_POST["inq3"] : NULL;
  $inq4 = isset($_POST["inq4"]) ? $_POST["inq4"] : NULL;
  $inq5 = isset($_POST["inq5"]) ? $_POST["inq5"] : NULL;
  $isOther = isset($_POST["other"]) ? $_POST["other"] : 0;
  $other = isset($_POST["other"]) ? $_POST["other"] : NULL;
  $comments = isset($_POST["comments"]) ? $_POST["comments"] : NULL;
  //compose with passed variables
  $message = '<table width="500" cellpadding="5" cellspacing="0" style="border:1px solid #311b92;color:#666666;">
          <tr>
            <td valign="middle" colspan="2" style="border-bottom:1px dotted #311b92;background:#673ab7;text-align:center;"><h3 style="color:#ffffff;">Stellar Networks Website Inquiry</h3></td>
          </tr>
          <tr style="background:#ede7f6;">
            <td style="font-weight:bold;width:20%;">First Name:</td>
            <td align="left">'.$first_name.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td style="font-weight:bold;width:10%">Phone:</td>
            <td align="left">'.$phone.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td style="font-weight:bold;width:10%">Company:</td>
            <td align="left">'.$company.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td style="font-weight:bold;width:10%">Email:</td>
            <td align="left">'.$email.'</td>
          </tr>
          <tr>
            <td colspan="2" style="border-bottom:1px dotted #311b92;background:#ede7f6;"></td>
          </tr>
          <tr>
            <td colspan="2" align="left" style="background:#b39ddb;padding:5px;color:#ffffff;;"><strong>I am inquiring about:</strong></td>
          </tr>
          <tr style="background:#ede7f6;">
            <td colspan="2" align="left">'.$inq1.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td colspan="2" align="left">'.$inq2.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td colspan="2" align="left">'.$inq3.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td colspan="2" align="left">'.$inq4.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td colspan="2" align="left">'.$inq5.'</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td style="font-weight:bold;">Other:</td>
            <td>'. $other . '</td>
          </tr>
          <tr style="background:#ede7f6;">
            <td colspan="2" style="border-bottom:1px dotted #311b92;"></td>
          </tr>
          <tr style="background:#ede7f6;">
            <td style="font-weight:bold;">Comments:</td>
            <td align="left">'.$comments.'</td>
          </tr>

  </table>';

  //call phpmailer
  require_once('phpmailer/PHPMailerAutoload.php');
  //Start Send Mail function
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'p3plcpnl0727.prod.phx3.secureserver.net';
  $mail->Port = '465';
  $mail->isHTML(true);
  $mail->Username = 'info@stellarnetworks.io';
  $mail->Password = 'Mangopen#61!';
  $mail->SetFrom('info@stellarnetworks.io','Mailer');
  $mail->Subject = 'Stellar Networks Web Site Inquiry';
  $mail->Body = $message;
  $mail->AddAddress('rey.angeles@stellarnetworks.io', 'Rey Angeles');
  $mail->AddAddress('3053212604@tmomail.net');
  $mail->AddAddress('sylvia.lopez@stellarnetworks.io', 'Sylvia Lopez');
  $mail->AddAddress('5616288499@messaging.sprintpcs.com');
  $mail->AddAddress('raul.angeles@stellarnetworks.io', 'Raul Angeles');
  $mail->AddAddress('3057728543@tmomail.net');

  $mail->Send();
  $sentSuccess = isset($_POST["sentSuccess"]) ? $_POST["sentSuccess"] : 1;
} elseif($_POST["sentCheck"] == 0) {
  $sentSuccess = isset($_POST["sentSuccess"]) ? $_POST["sentSuccess"] : 0;

} else{
  $sentSuccess = isset($_POST["sentSuccess"]) ? $_POST["sentSuccess"] : NULL;
}
 ?>
