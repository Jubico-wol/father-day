
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../styles.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="bg">
    <div class="capa">
        <div class="capa2">

            <nav class="navbar bg-nav">
                <div class="container-fluid">
                    <div class="center">
                        <img class="pointer" src="../assets/logo.png" alt="logo">
                    </div>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="flex">
                        
                        <div class="col-md-3"></div>
                        <div class="col-md-6 center">
                            <img class="img-100" src="../assets/participando.png" alt="ya estas participndo">
                            <br><br>
                            <div onClick="goTo()" class="card pointer">
                        
                        <div class="center">
                        <img class="img-100" src="../assets/check.png" alt="ok">
                        </div>
                            
                            <h4 class="white">YA ESTAS</h4>
                            <h4 class="white">PARTICIPANDO</h4>
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

            <script>
                function goTo(){
                    var url = "/tona-father/"; 
                    window.location = url; 
                }
            </script>

        </div>          
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
