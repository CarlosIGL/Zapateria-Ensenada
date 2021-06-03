<?php
require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$consulta = "SELECT Id_Dama, IMAGEN from altadama";
$result =$mysql->query($consulta)
?>

<!doctype>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ=="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title >Panaderia Carlitos</title>
    <link rel="shortcut icon" href="image/logo.png" />

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo1.css">
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet'>

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
</head>
<body >
<br>
<br>
<br>

<nav class="navbar navbar-expand-md navbar-custom fixed-top">
    <a class="navbar-brand" href="#"><img src="img/polo.png" width="50" height="50"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation" >
        <img src="image/tres.png" width="40" height="40">
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link font" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown font">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalogo</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Zapatos</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02">
                        <a class="dropdown-item" href="Damas.php">Dama</a>
                        <a class="dropdown-item" href="Zapatos.php">Caballero</a>
                    </div>
                    <a class="dropdown-item" href="Ropa.php">Ropa Casual</a>
                    <a class="dropdown-item" href="Batas.php">Batas</a>
                </div>
            </li>

            <li class="nav-item font">
                <a class="nav-link portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal0" href="#">Nosotros</a>
            </li>

        </ul>
    </div>
</nav>

<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="container">
        <div class="row justify-content-center text-center">
            <?php
            foreach ($result as $row):
                ?>
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 pb-2">
                    <br>
                    <div class="card">

                        <img src="<?= $row['IMAGEN'] ?>" alt="" class="car-top">
                    </div>
                    <hr>
                    <p><a href="InfoDama.php?id=<?php echo $row["Id_Dama"];?>" class="btn btn-secondary"  role="button" >Mas Informacion &raquo;</a></p>
                </div>
            <?php
            endforeach;
            ?>
        </div>

        <hr>

        <div class="row featurette">
            <div class="col-md-4">
                <h2 class="featurette-heading">SERVICIO AL CLIENTE.</h2>
                <p><a class="lead servicio" role="button" data-toggle="modal" data-target="#portfolioModal1" href="#">Preguntas Frecuentes.</a></p>
                <p><a class="lead servicio" role="button" data-toggle="modal" data-target="#portfolioModal2" href="#">Contactos.</a></p>

            </div>

            <div class="col-md-4">
                <h2 class="featurette-heading">SOBRE LA EMPRESA. </h2>
                <p><a class="lead servicio" role="button" data-toggle="modal" data-target="#portfolioModal3" href="#">Sobre Zapateria Ensenada.</a></p>

            </div>

            <div class="col-md-4">
                <h2 class="featurette-heading">TERMINOS DEL SITIO.</h2>
                <p ><a  class="lead servicio" role="button" href="#">Condiciones de uso.</a></p>
                <p><a class="lead servicio" role="button" href="#">Politica de privacidad.</a></p>
                <p><a class="lead servicio" role="button" href="#">Politica de devoluciones.</a></p>
                <p><a class="lead servicio" role="button" href="#">Terminos y condiciones.</a></p>
                <hr>
                <h2 class="featurette-heading">#ZAPATERIAENSENADA.</h2>
                <a href="#" onclick="location.href='https://www.facebook.com/Zapateria-Ensenada-109367044692913'">
                    <img src="img/Fbicon.png"  height="50">
                </a>
                <img src="img/wspicon.png" height="50">

            </div>

        </div>
        <hr>
        <p><a class="btn btn-secondary" href="#" role="button" onclick="location.href='ingresar.php'">Ingresar &raquo;</a></p>
    </div>

    <!-- /container -->

    <!--Modal 0-->
    <div class="modal" tabindex="-1" role="dialog" id="portfolioModal0">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Acerca de nosotros...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Nosotros somos una zapateria nuevo en el mercado abriendo nuestro primer local en el año 2020
                        y nuestro objetivo principal es satisfacer el gusto de todas las familias mexicanas</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Fin de modal 0-->
    <!---Inicio de modal 1-->
    <div class="modal" tabindex="-1" role="dialog" id="portfolioModal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preguntas frecuentes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> ¿Donde nos ubicamos?</p>
                    <p>¿Cuales son las politicas de devolución?</p>
                    <p>¿Debo registrarme para comprar o pedir en linea?</p>
                    <p>¿Tienes alguna queja, sugerencia o comentario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="portfolioModal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contactos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Nos puede contactar a traves del siguente numero de WhatsApp: +516462048181</p>
                    <p> O bien con el siguente correo electronico: godinezlunac@gmail.com</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="portfolioModal3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sobre Zapateria Ensenada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Sobre la empresa
                        Es una empresa familia que en sus inicios solo publicaba en páginas de Facebook de compra y venta pero ha
                        decidido ampliar sus horizontes a más visibilidad hacia el público en general.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</main>
<footer class="container">
    © 2021 Zapateria Ensenada. Todos los Derechos Reservados.
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script></body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>