<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:35
  from '/home/grouaknd/public_html/Campanas/templates/Admin/chequeoCampana.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558cba99b88_55216493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e41bc70cc262e450ef23a6b908a8d8240fc50e5' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/chequeoCampana.tpl',
      1 => 1629837207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/comun/metatags.tpl' => 1,
    'file:Admin/comun/estilos.tpl' => 1,
    'file:Admin/comun/menuMobile.tpl' => 1,
    'file:Admin/comun/menu.tpl' => 1,
    'file:Admin/comun/header.tpl' => 1,
    'file:Admin/comun/footer.tpl' => 1,
    'file:Admin/comun/scripts.tpl' => 1,
  ),
),false)) {
function content_612558cba99b88_55216493 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/metatags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <!-- Title Page-->
    <title>Campaña - Chequeo</title>

    <!-- ESTILOS -->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/estilos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- END ESTILOS -->

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/menuMobile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">                           
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Campaña: <?php echo $_smarty_tpl->tpl_vars['campNombre']->value;?>
 (FB ID:<?php echo $_smarty_tpl->tpl_vars['campIdFb']->value;?>
)</strong> - Chequeo
                                    </div>
                                    <div class="card-body card-block">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['respuesta']->value, 'linea');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['linea']->value) {
?>
                                            <p><?php echo $_smarty_tpl->tpl_vars['linea']->value;?>
</p>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" id="btnRegresar" alt="<?php echo $_smarty_tpl->tpl_vars['regreso']->value;?>
">
                                            <i class="fa fa-backward"></i> Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="container">
                                    <!-- ALERT-->
                                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade hide" id="mensaje">
                                                <span class="badge badge-pill badge-primary">Atención</span>
                                                Todos los datos son obligatorios, o se produjo un error al guardar.
                                                <button type="button" class="close" aria-label="Close" id="btnCerrar">
                                                        <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                    <!-- END ALERT-->
                                </div>
                        </div>                                                
                        <!-- FOOTER -->
                        <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                        <!-- END FOOTER -->
                    </div>
                </div>
            </div>
        </div>

    </div>
	
    <!-- SCRIPTS -->
	<?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/chequeoCampana.js"><?php echo '</script'; ?>
>
        <!--script src="js/notificaciones.js"><?php echo '</script'; ?>
-->
    <!-- END SCRIPTS -->


</body>

</html>
<!-- end document-->
<?php }
}
