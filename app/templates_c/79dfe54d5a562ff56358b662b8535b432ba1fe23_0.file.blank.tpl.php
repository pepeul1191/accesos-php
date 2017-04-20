<?php
/* Smarty version 3.1.31, created on 2017-03-29 22:54:24
  from "/home/pepe/Documentos/php/trunk/app/templates/layouts/blank.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58dc81703c1734_68854402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79dfe54d5a562ff56358b662b8535b432ba1fe23' => 
    array (
      0 => '/home/pepe/Documentos/php/trunk/app/templates/layouts/blank.tpl',
      1 => 1490845392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58dc81703c1734_68854402 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Ecore Trading SAC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inicio CSS -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('base_url');?>
public/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('base_url');?>
public/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('base_url');?>
public/assets/site/css/styles.css" />
    <!-- Fin CSS -->
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['partial']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <!-- Inicio JS-->
    <?php echo '<script'; ?>
 src="<?php echo Configuration::get('base_url');?>
public/bower_components/jquery/dist/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo Configuration::get('base_url');?>
public/bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <!-- Fin JS-->
</body>
</html><?php }
}
