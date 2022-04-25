<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:10
  from '/home/grouaknd/public_html/Campanas/templates/Admin/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558b2486c85_13205962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '843b65abe65921c2605c37b9c1f749f81deebd31' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/index.tpl',
      1 => 1629837202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/comun/metatags.tpl' => 1,
    'file:Admin/comun/estilos.tpl' => 1,
    'file:Admin/comun/scripts.tpl' => 1,
  ),
),false)) {
function content_612558b2486c85_13205962 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/metatags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   
    <!-- Title Page-->
    <title>Campañas - Ingreso al Sistema</title>

    <!-- ESTILOS -->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/estilos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- END ESTILOS -->

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form id="formulario">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input class="au-input au-input--full" name="usuId" id="usuId" placeholder="Usuario" value="<?php echo $_smarty_tpl->tpl_vars['usuId']->value;?>
">
                                </div>
                                <div class="form-group">
                                    <label>Clave</label>
                                    <input class="au-input au-input--full" type="password" name="usuPass" id="usuPass" placeholder="Clave">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="usuRecordar" id="usuRecordar" value="S" <?php echo $_smarty_tpl->tpl_vars['usuRecordar']->value;?>
>Recordarme en esta máquina
                                    </label>
                                    <label>
                                        <a href="recordar.php">¿Olvidó su clave?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="button" id="btnIngresar">Ingresar</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    ¿No tiene cuenta?
                                    <a href="mailto:rodrigo.melian@yr.com?subject=Solicitud%20de%20acceso" target="_blank">Solicítela aquí</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="login-wrap">
                        <!-- ALERT-->
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade hide" id="mensaje">
                                    <span class="badge badge-pill badge-danger">Error</span>
                                    Las credenciales no son correctas, reintente.
                                    <button type="button" class="close" id="btnCerrar" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                    </button>
                            </div>
                        <!-- END ALERT-->
                    </div>
            </div>                                
        </div>

    </div>

    <!-- SCRIPTS -->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/index.js"><?php echo '</script'; ?>
>
    <!-- END SCRIPTS -->

</body>

</html>
<!-- end document--><?php }
}
