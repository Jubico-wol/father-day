<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
    <section class="bg">
        <div class="capa">
        
            <nav class="navbar bg-nav">
                <div class="container-fluid">
                    <div class="center">
                    <img src="./assets/logo.png" alt="logo">
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                   <div class="flex">
                   <div class="col-md-6">
                        <img class="img-100" src="./assets/father.png" alt="son&father">
                    </div>
                    <div class="col-md-6">
                        <img class="img-100" src="./assets/group2.png" alt="son&father">
                        <div class="pol">
                        El ganador será elegido aleatoriamente y anunciado 
                        el  16 de  junio en nuestras redes sociales oficiales.
                        </div>
                        <br>
                       <div class="center">
                            <button class="btn btn-tona" onClick="load()"> Participar </button>
                            <p class="white">*Aplican restricciones </p>
                       </div>
                    </div>
                   </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="footer">
                        <div class="col-md-12">
                            <img src="./assets/footer.png" alt="">
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>

<script>
   function load(){
    var url = "/tona-father/register/"; 
    window.location = url; 
   }
</script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>