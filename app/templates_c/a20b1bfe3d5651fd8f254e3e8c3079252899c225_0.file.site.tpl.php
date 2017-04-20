<?php
/* Smarty version 3.1.31, created on 2017-03-30 01:58:49
  from "/home/pepe/Documentos/php/eil/app/templates/layouts/site.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58dcaca9302343_60902703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a20b1bfe3d5651fd8f254e3e8c3079252899c225' => 
    array (
      0 => '/home/pepe/Documentos/php/eil/app/templates/layouts/site.tpl',
      1 => 1490857126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58dcaca9302343_60902703 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Ecoservicios E Ingeniería Limpia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inicio CSS -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('base_url');?>
public/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('base_url');?>
public/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('base_url');?>
public/bower_components/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('base_url');?>
public/assets/site/css/styles.css" />
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
          <a class="navbar-brand" href="#"><img src="<?php echo Configuration::get('base_url');?>
public/assets/site/img/LogoEIL.png" width="190" height="70" ></a>
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
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['partial']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <!-- Inicio Footer-->
    <footer style="height: 200px; background: #1C1B1B">
            FOOTER
    </footer>
    <!-- Fin Footer-->
    <!-- Inicio JS-->
    <?php echo '<script'; ?>
 src="<?php echo Configuration::get('base_url');?>
public/bower_components/jquery/dist/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo Configuration::get('base_url');?>
public/bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo Configuration::get('base_url');?>
public/bower_components/owl.carousel/dist/owl.carousel.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo Configuration::get('base_url');?>
public/assets/site/js/app.js" type="text/javascript"><?php echo '</script'; ?>
>
    <!-- Fin JS-->
</body>
</html><?php }
}
