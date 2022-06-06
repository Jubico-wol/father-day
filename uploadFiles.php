<?php
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
require './PHPMailer/phpmailer/src/Exception.php';
require './PHPMailer/phpmailer/src/PHPMailer.php';
require './PHPMailer/phpmailer/src/SMTP.php';
require './recaptcha.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

$pdo = require 'conf.php';
require './functions/privateFunctions.php';
try {
    if(isset($_POST['g-recaptcha-response'])){
        define("CLAVE_SECRETA", "6LdklEEgAAAAACKBMTzybuzhbyWAKE0rXt4s3cBi");
        if (!isset($_POST["g-recaptcha-response"]) || empty($_POST["g-recaptcha-response"])) {
            exit("Debes completar el captcha");
        }
        $token = $_POST["g-recaptcha-response"];
        $verificado = verificarToken($token, CLAVE_SECRETA);
        if ($verificado) {
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['cui'])  && isset($_POST['telefono'])&& isset($_POST['terms'])){
                $ip_address = $_SERVER['REMOTE_ADDR'];
                if(isset($_FILES['fileToUpload']['type'])){
                    $errors = array();
                    $messages = array();
                    $carpeta = "./archivos/";
                    $target_file = $carpeta . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = true;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {
                            $errors[]= "El archivo es una imagen - " . $check["mime"] . ".";
                        } else {
                            $response = array(
                                "status" => 400,
                                "msg" => "El archivo no es una imagen."
                            );
                            echo json_encode($response);
                            return;    
                        }
                    }
        
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $uploadOk = false;
                        $response = array(
                            "status" => 400,
                            "msg" => "Lo sentimos, sólo archivos JPG, JPEG, PNG son permitidos."
                        );
                        echo json_encode($response);
                        return;
                    }
                   
                    $telefono = intval(cleanInt($_POST['telefono']));
                    $cui = clean($_POST['cui']);
                    if(strlen($cui) < 14){
                        $response = array(
                            "status" => 400,
                            "msg" => "cui debe tener 14 digitos"
                        );
                    }else{
                        $dbhost = new PDO($dsn, $username, $password, $options);
                    $query = "SELECT id FROM usuarios_father_day WHERE cui = :cui OR email = :email;";
                    $stmt = $dbhost->prepare($query);
                    $stmt->bindParam(':cui', $cui);
                    $stmt->bindParam(':email', $_POST["email"]);
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        $response = array(
                            "status" => 400,
                            "msg" => "El usuario ya existe"
                        );
                    }else{
                        $nombre = strtoupper(removeSpacesBetwen($_POST['nombre']));
                        $apellido = strtoupper(removeSpacesBetwen($_POST['apellido']));
                        $email = strtolower(removeSpacesBetwen($_POST['email']));
                        $comentario = $_POST['comentario'];
                        if($uploadOk){
                            $id_foto = time();
                            $url_foto = "../archivos/".$id_foto.".".$imageFileType;
                            $name = $carpeta.$id_foto.".".$imageFileType;
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $name)) {
                                $file_name = $id_foto.".".$imageFileType;
                                $query = "INSERT INTO usuarios_father_day SET nombre=:nombre, apellido=:apellido, cui=:cui, email=:email, telefono=:telefono, fecha_registro=now(), ip_address=:ip,estado=1,url=:url,comentario=:comentario  ;";
                                $stmt = $dbhost->prepare($query);
                                $stmt->bindParam(':nombre', $nombre);
                                $stmt->bindParam(':apellido', $apellido);
                                $stmt->bindParam(':cui', $cui);
                                $stmt->bindParam(':email', $email);
                                $stmt->bindParam(':telefono', $telefono);
                                $stmt->bindParam(':ip', $ip_address);
                                $stmt->bindParam(':url', $file_name);
                                $stmt->bindParam(':comentario', $comentario);
                                if($stmt->execute()){ 
                                    
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->isSMTP();
                                    $mail->CharSet = "UTF-8";
                                    $mail->Port = 587;
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                    $mail->SMTPAuth   = true;
                                    $mail->Username = "support@wolvisor.com";
                                    $mail->Password = "lmceoebvcleisjdx";
                                    $mail->setFrom('support@wolvisor.com', 'Toña Light');
                                    $mail->addAddress($email);
                                    $mail->isHTML(true);
                                    $mail->Subject = 'YA ESTAS PARTICIPANDO';
                                    $mail->Body  = "<div>
                                                        <img src='https://cervezatona.com/dia-del-padre/assets/img/email.png'>
                                                    </div>";
        
                                    
                                    if($mail->send()){
                                        $response = array(
                                            "status" => 200,
                                            "msg" => "El Archivo ha sido subido correctamente."
                                        );
                                    }else{
                                        $response = array(
                                            "status" => 400,
                                            "msg" => "Error al enviar el correo."
                                        );
                                    }
                                    
                                    $response = array(
                                        "status" => 200,
                                        "msg" => "Registrado con éxito"
                                    );
                                }
                                
                            }
                        }
                    }
                    }
                    
                    
                }else{
                    $response = array(
                        "status" => 400,
                        "msg" => "Lo sentimos, hubo un error subiendo el archivo."
                    );
                }
        
               
            }else{ 
                $data = array(
                    'nombre'=>isset($_POST['nombre']), 
                    'apellido'=>isset($_POST['apellido']),
                    'email'=>isset($_POST['email']),
                    'cui'=>isset($_POST['cui']),
                    'telefono'=>isset($_POST['telefono']),
                    'terms'=>isset($_POST['terms']),
                    'comentario'=>isset($_POST['comentario'])
                );
        
                $response = array(
                    "status" => 400,
                    "msg" => "Algunos datos vienen vacios",
                    "data"=> $data
                );
            }
        
            echo json_encode($response);
            
        } else {
            $response = array(
                "status" => 400,
                "msg" => "Captcha no validado"
            );
            echo json_encode($response);
    
        }
    }else{
        $response = array(
            "status" => 400,
            "msg" => "Seleccione captcha"
        );
        echo json_encode($response);
    }
   

} catch (\Throwable $th) {
    echo json_encode($th);
}
