<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:21
  from '/home/grouaknd/public_html/Campanas/templates/Admin/principal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558bdbd1456_14866311',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86b360a4192d6eb0a30395f493d23bc8a615f805' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/principal.tpl',
      1 => 1629837203,
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
function content_612558bdbd1456_14866311 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/metatags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <!-- Title Page-->
    <title>Campañas - Principal</title>

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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Vista rápida</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <!-- Chart Clientes -->
                            <?php echo '<script'; ?>
>
                                var etiquetasClientes = [];
                                var valoresClientes = [];
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datosClientes']->value, 'cliente');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
?>
                                    etiquetasClientes.push('<?php echo $_smarty_tpl->tpl_vars['cliente']->value['Fecha'];?>
');
                                    valoresClientes.push(<?php echo $_smarty_tpl->tpl_vars['cliente']->value['Cantidad'];?>
);
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php echo '</script'; ?>
>
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $_smarty_tpl->tpl_vars['clientes']->value;?>
</h2>
                                                <span>Clientes</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChartClientes"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Chart Clientes -->     
                            
                            <!-- Chart Campañas -->
                            <?php echo '<script'; ?>
>
                                var etiquetasCampanas = [];
                                var valoresCampanas = [];
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datosCampanas']->value, 'campana');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campana']->value) {
?>
                                    etiquetasCampanas.push('<?php echo $_smarty_tpl->tpl_vars['campana']->value['Fecha'];?>
');
                                    valoresCampanas.push(<?php echo $_smarty_tpl->tpl_vars['campana']->value['Cantidad'];?>
);
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php echo '</script'; ?>
>
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-folder-image"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $_smarty_tpl->tpl_vars['campanas']->value;?>
</h2>
                                                <span>Campañas</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChartCampanas"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Chart Campañas -->                                                                            
                        </div>
                        <div class="row">
                            <!-- Chart Piezas -->
                            <?php echo '<script'; ?>
>
                                var etiquetasPiezas = [];
                                var valoresPiezas = [];
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datosCampanasErr']->value, 'campana');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campana']->value) {
?>
                                    etiquetasPiezas.push('<?php echo $_smarty_tpl->tpl_vars['campana']->value['Fecha'];?>
');
                                    valoresPiezas.push(<?php echo $_smarty_tpl->tpl_vars['campana']->value['Cantidad'];?>
);
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php echo '</script'; ?>
>                            
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-alarm-check"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $_smarty_tpl->tpl_vars['piezas']->value;?>
</h2>
                                                <span>Para Chequear</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChartPiezas"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Chart Piezas -->                                                
                            
                            <!-- Chart Notificaciones -->
                            <?php echo '<script'; ?>
>
                                var etiquetasNotif = [];
                                var valoresNotif = [];
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datosCampanasOk']->value, 'campana');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campana']->value) {
?>
                                    etiquetasNotif.push('<?php echo $_smarty_tpl->tpl_vars['campana']->value['Fecha'];?>
');
                                    valoresNotif.push(<?php echo $_smarty_tpl->tpl_vars['campana']->value['Cantidad'];?>
);
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php echo '</script'; ?>
>                                                        
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-check-all"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $_smarty_tpl->tpl_vars['notifs']->value;?>
</h2>
                                                <span>Chequeadas</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChartNotif"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Chart Notificaciones -->                                                
                        </div>
                        <!-- FOOTER -->
                        <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                        <!-- END FOOTER -->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- SCRIPTS -->
	<?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php echo '<script'; ?>
 src="js/notificaciones.js"><?php echo '</script'; ?>
>
    <!-- END SCRIPTS -->

</body>

</html>
<!-- end document-->
<?php }
}
