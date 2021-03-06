<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../styles.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<section class="bg">
    <div class="capa">
        <div class="capa2">

            <nav class="navbar bg-nav pointer">
                <div class="container-fluid pointer">
                    <div class="center">
                    <img onClick="goTo()" class="pointer" src="../assets/logo.png" alt="logo">
                    </div>
                </div>
            </nav>

            <div class="container" id="register">
                <div class="row">
                    <div class="flex">
                        
                        <div class="col-md-3"></div>
                        <div class="col-md-6 center">
                            <img class="img-100" src="../assets/titular.png" alt="son&father">
                            <br><br>
                            <div class="card">
                                <br>
                                <h3 class="white">REGISTRATE</h3>
                            
                                <form class="form-margin" id="form" action="">
                                    <div class="center"> 
                                        
                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="nombre" placeholder="NOMBRE*" name="nombre"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="apellido" placeholder="APELLIDO*"  name="apellido" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <input type="text" class="form-control" id="email" placeholder="CORREO ELECTR??NICO*" name="email" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <input type="text" class="form-control" id="cui" name="cui" placeholder="No. IDENTIFICACI??N*" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                onKeypress="if(event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122){return true;}return false;"
                                                minlength="14" maxlength="14"/>
                                                <span id="error"></span>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <input type="number" class="form-control" id="telefono" placeholder="TEL??FONO*" name="telefono"
                                                onKeypress="if(event.charCode >= 48 && event.charCode <= 57){return true;}return false;"/>
                                            </div>
                                        </div>
            
                                        <div class="form-check">
                                            <input class="form-check-input messageCheckbox" type="checkbox" id="check">
                                            <label class="form-check-label white" for="flexCheckDefault" >
                                                <span class="white"> ACEPTO TERMINOS Y CONDICIONES </span>
                                            </label>
                                        </div>
                                        <br>
                                        <button type="button" class="btn btn-tona" onclick="validate()" value="Submit form"><b class="white">Enviar</b></button>
                                        <br>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>

            <div class="container"  id="picture">
                <div class="row">
                    <div class="flex"> 
                        
                        <div class="col-md-3"></div>
                        <div class="col-md-6 center">
                            <img class="img-100" src="../assets/titular.png" alt="son&father">
                            <br><br>
                            <div class="card">
                                <br>
                                <h3 class="white">SUBIR FOTO</h3>
                            
                                <form class="form-margin" id="form" name="name" action="">
                                    <div class="center"> 
                                        
                                        <div class="mb-3">
                                            <div class="image-input">
                                               <div class="img-box">
                                                <input type="file" accept="image/*" id="imageInput" name="fileToUpload">
                                                    <label for="imageInput" class="image-button pointer"></label>
                                                <img src="" class="image-preview">
                                               </div>
                                                <span class="change-image">Elegir otra fotograf??a</span>
                                            </div>
                                        </div>
                                        <p id="error"></p>

                                        <div class="mb-3">
                                            <textarea class="form-control" id="comentario" placeholder="Comentario" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3" style="text-align: -webkit-center;">
                                            <div class="g-recaptcha" data-sitekey="6LdklEEgAAAAAHBYdMUJ2AkSnBYPA0k55isdsN6E"></div>
                                        </div>
                                       
                                        <br>
                                        <button type="button" id="btn-register" class="btn btn-tona" onclick="send()" value="Submit form"><b class="white">Enviar</b></button>
                                        <br>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="footer">
                </div>
            </div>

        </div>        
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="index.js"></script>
</body>
</html>