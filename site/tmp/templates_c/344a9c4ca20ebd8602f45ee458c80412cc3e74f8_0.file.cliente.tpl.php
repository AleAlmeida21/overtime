<?php
/* Smarty version 3.1.33, created on 2021-08-23 15:08:58
  from '/home/grouaknd/public_html/Campanas/templates/Admin/cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6123e43a862965_97288622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '344a9c4ca20ebd8602f45ee458c80412cc3e74f8' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/cliente.tpl',
      1 => 1629732751,
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
function content_6123e43a862965_97288622 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/metatags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <!-- Title Page-->
    <title>Campaña - Cliente</title>

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
                                        <strong>Cliente</strong> Mantenimiento
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="formulario">
                                            <input type="hidden" name="accion" id="accion" value="<?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
">
                                            <input type="hidden" name="cliId" id="cliId" value="<?php echo $_smarty_tpl->tpl_vars['cliId']->value;?>
">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nombre</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="cliNombre" placeholder="Nombre Cliente" class="form-control" id="cliNombre" value="<?php echo $_smarty_tpl->tpl_vars['cliNombre']->value;?>
">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Agencia</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select type="text" name="cliAgencia" placeholder="Agencia" class="form-control" id="cliAgencia" disabled="disabled">
                                                        <option value="">Seleccione Agencia</option>
                                                        <option value ="MINDSHARE" <?php if ($_smarty_tpl->tpl_vars['cliAgencia']->value == "MINDSHARE") {?>selected="selected"<?php }?>>MINDSHARE</option>
                                                        <option value ="WAVEMAKER" <?php if ($_smarty_tpl->tpl_vars['cliAgencia']->value == "WAVEMAKER") {?>selected="selected"<?php }?>>WAVEMAKER</option>
                                                        <option value ="MEDIACOM" <?php if ($_smarty_tpl->tpl_vars['cliAgencia']->value == "MEDIACOM") {?>selected="selected"<?php }?>>MEDIACOM</option>
                                                        <option value ="WUNDERMAN" <?php if ($_smarty_tpl->tpl_vars['cliAgencia']->value == "WUNDERMAN") {?>selected="selected"<?php }?>>WUNDERMAN</option>
                                                        <option value ="MSIX" <?php if ($_smarty_tpl->tpl_vars['cliAgencia']->value == "MSIX") {?>selected="selected"<?php }?>>MSIX</option>
                                                    </select>                                                
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">FB ID</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="cliFbId" placeholder="FB Id" class="form-control" id="cliFbId" value="<?php echo $_smarty_tpl->tpl_vars['cliFbId']->value;?>
">
                                                </div>
                                            </div>                                                    
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">
                                            <i class="fa fa-save"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-sm" id="btnRegresar">
                                            <i class="fa fa-backward"></i> Regresar
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
 type="text/javascript" src="js/cliente.js"><?php echo '</script'; ?>
>
        <!--script src="js/notificaciones.js"><?php echo '</script'; ?>
-->
    <!-- END SCRIPTS -->


</body>

</html>
<!-- end document-->
<?php }
}
