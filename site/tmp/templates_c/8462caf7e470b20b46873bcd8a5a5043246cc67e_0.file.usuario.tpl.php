<?php
/* Smarty version 3.1.33, created on 2021-08-23 15:09:17
  from '/home/grouaknd/public_html/Campanas/templates/Admin/usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6123e44dc735d3_66033889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8462caf7e470b20b46873bcd8a5a5043246cc67e' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/usuario.tpl',
      1 => 1629732747,
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
function content_6123e44dc735d3_66033889 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/metatags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <!-- Title Page-->
    <title>Campaña - Usuario</title>

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
                                        <strong>Usuario</strong> Mantenimiento
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="formulario">
                                            <input type="hidden" name="accion" id="accion" value="<?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Usuario</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="usuId" placeholder="Usuario" class="form-control" id="usuId" value="<?php echo $_smarty_tpl->tpl_vars['usuId']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['accion']->value != "a") {?>readonly="readonly"<?php }?>>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Clave</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" name="usuPass" placeholder="Clave" class="form-control" id="usuPass" value="<?php echo $_smarty_tpl->tpl_vars['usuPass']->value;?>
">
                                                </div>
                                            </div>       
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Rol</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="usuRol" id="usuRol" class="form-control" <?php echo $_smarty_tpl->tpl_vars['usuRol']->value;?>
>
                                                        <option value="O" <?php echo $_smarty_tpl->tpl_vars['usuRolC']->value;?>
>Operador</option>
                                                        <option value="U" <?php echo $_smarty_tpl->tpl_vars['usuRolU']->value;?>
>Usuario</option>
                                                        <option value="A" <?php echo $_smarty_tpl->tpl_vars['usuRolA']->value;?>
>Administrador</option>
                                                    </select>
                                                </div>
                                            </div>                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Correo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="usuCorreo" name="usuCorreo" placeholder="Correo" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuCorreo']->value;?>
">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Agencia</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select type="text" name="usuAgencia" placeholder="Agencia" class="form-control" id="usuAgencia">
                                                        <option value="">Seleccione Agencia</option>
                                                        <option value ="MINDSHARE" <?php if ($_smarty_tpl->tpl_vars['usuAgencia']->value == "MINDSHARE") {?>selected="selected"<?php }?>>MINDSHARE</option>
                                                        <option value ="WAVEMAKER" <?php if ($_smarty_tpl->tpl_vars['usuAgencia']->value == "WAVEMAKER") {?>selected="selected"<?php }?>>WAVEMAKER</option>
                                                        <option value ="MEDIACOM" <?php if ($_smarty_tpl->tpl_vars['usuAgencia']->value == "MEDIACOM") {?>selected="selected"<?php }?>>MEDIACOM</option>
                                                        <option value ="WUNDERMAN" <?php if ($_smarty_tpl->tpl_vars['usuAgencia']->value == "WUNDERMAN") {?>selected="selected"<?php }?>>WUNDERMAN</option>
                                                        <option value ="MSIX" <?php if ($_smarty_tpl->tpl_vars['usuAgencia']->value == "MSIX") {?>selected="selected"<?php }?>>MSIX</option>
                                                    </select>   
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
 type="text/javascript" src="js/usuario.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/notificaciones.js"><?php echo '</script'; ?>
>
    <!-- END SCRIPTS -->


</body>

</html>
<!-- end document-->
<?php }
}
