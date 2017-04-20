<html>
<head>
    <meta charset="utf-8">
    <title>Ecoservicios E Ingeniería Limpia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inicio CSS -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <link rel="stylesheet" type="text/css" href="{Configuration::get('base_url')}public/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{Configuration::get('base_url')}public/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{Configuration::get('base_url')}public/bower_components/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="{Configuration::get('base_url')}public/assets/site/css/styles.css" />
    <!-- Fin CSS -->
</head>
<body>
    <!-- Inicio Header -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="{Configuration::get('base_url')}public/assets/site/img/LogoEIL.png" width="190" height="70" ></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="#nosotros">Nosotros</a></li>
            <li><a href="#actividades">Servicios</a></li>
            <li><a href="#sucursales">Sedes</a></li>
            <li><a href="#galeria">Galería</a></li>
            <li><a href="#contacto">Contacto</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Fin Header -->
    {include file=$partial}
    <!-- Inicio Footer-->
    <footer style="height: 200px; background: #1C1B1B">
            FOOTER
    </footer>
    <!-- Fin Footer-->
    <!-- Inicio JS-->
    <script src="{Configuration::get('base_url')}public/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{Configuration::get('base_url')}public/bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{Configuration::get('base_url')}public/bower_components/owl.carousel/dist/owl.carousel.min.js" type="text/javascript"></script>
    <script src="{Configuration::get('base_url')}public/assets/site/js/app.js" type="text/javascript"></script>
    <!-- Fin JS-->
</body>
</html>