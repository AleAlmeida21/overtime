<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:28
  from '/home/grouaknd/public_html/Campanas/templates/Admin/campanas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558c4e4a3e4_05428984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24d9e1b8ff043ca302f3b4ef46deafd169945698' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/campanas.tpl',
      1 => 1629837210,
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
function content_612558c4e4a3e4_05428984 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/metatags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <!-- Title Page-->
    <title>Campañas - Campañas</title>

    <!-- ESTILOS -->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/estilos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <link href="css/preloader.css" rel="stylesheet" media="all">
    <style>
        .Error{
            color: #FFFFFF;
            background-color: #d43f3a;
            text
        }
        .Chequeada{
            color: #FFFFFF;
            background-color: #34ce57;
            text
        } 
        .Terminada{
            color: #FFFFFF;
            background-color: #000000;
            text
        }  
    </style>
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
                                <div class="container">
                                    <!-- ALERT-->
                                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade hide">
                                                <span class="badge badge-pill badge-primary">Success</span>
                                                You successfully read this important alert.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                    <!-- END ALERT-->
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Campañas</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        Filtrar Cliente: 
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="filtro" id="filtro">
                                                <option selected="selected" value="-1">Todos</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lstClientes']->value, 'cliente');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliId;?>
" <?php if ($_smarty_tpl->tpl_vars['cliente']->value->cliId == $_smarty_tpl->tpl_vars['filtro']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliNombre;?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        Estado:
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="campEstado" id="campEstado">
                                                <option value="">Todos los estados</option>
                                                <option value="Sin Implementar" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Sin Implementar") {?>selected="selected"<?php }?>>Sin Implementar</option>
                                                <option value ="Implementada" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Implementada") {?>selected="selected"<?php }?>>Implementada</option>
                                                <option value ="Chequeada" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Chequeada") {?>selected="selected"<?php }?>>Chequeada</option>
                                                <option value ="Error" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Error") {?>selected="selected"<?php }?>>Error</option>
                                                <option value ="Terminada" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Terminada") {?>selected="selected"<?php }?>>Terminada</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <?php if ($_smarty_tpl->tpl_vars['rol']->value != "C") {?>
                                            <button class="au-btn au-btn-icon au-btn--blue au-btn--small" id="btnCheckAll">
                                            <i class="zmdi zmdi-check-all"></i>chequear Campañas</button>                                            
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" id="btnAgregar">
                                            <i class="zmdi zmdi-plus"></i>agregar Campaña</button>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <!--th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th-->
                                                <th>ID Campaña</th>
                                                <th>Agencia</th>
                                                <th>Cliente</th>
                                                <th>Nombre</th>
                                                <th>Fecha</th>
                                                <th>Inversión</th>
                                                <th>Estado</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['campanas']->value, 'campana');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campana']->value) {
?>
                                                <tr class="tr-shadow">
                                                    <!--td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value->campId;?>
">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td-->
                                                    <td><?php echo $_smarty_tpl->tpl_vars['campana']->value->campId;?>
</td>
                                                   <td><?php echo $_smarty_tpl->tpl_vars['campana']->value->campAgencia;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['campana']->value->cliNombre;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['campana']->value->campNombre;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['campana']->value->campFecSol;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['campana']->value->campInvers;?>
</td>
                                                    <td><span class="<?php echo $_smarty_tpl->tpl_vars['campana']->value->campEstado;?>
"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['campana']->value->campEstado;?>
&nbsp</strong></span></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item btnChequear" data-toggle="tooltip" data-placement="top" title="Chequear" alt="<?php echo $_smarty_tpl->tpl_vars['campana']->value->campId;?>
">
                                                                <i class="zmdi zmdi-check"></i>
                                                            </button>                                                            
                                                            <button class="item btnEditar" data-toggle="tooltip" data-placement="top" title="Editar" alt="<?php echo $_smarty_tpl->tpl_vars['campana']->value->campId;?>
">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                            <button type="button" data-placement="top" title="Borrar" alt="<?php echo $_smarty_tpl->tpl_vars['campana']->value->campId;?>
" class="item btnBorrar" data-toggle="modal" data-target="#smallmodal">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>                        
                        <!-- FOOTER -->
                        <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                        <!-- END FOOTER -->
                    </div>
                </div>
            </div>
            <!-- modal small Borrar-->
            <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title" id="smallmodalLabel">Confirme la acción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                            <p>
                                                    Esta seguro de querer eliminar el elemento seleccionado.
                                            </p>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" id="btnConfirmar" class="btn btn-primary">Confirmar</button>
                                    </div>
                            </div>
                    </div>
            </div>
            <!-- end modal small -->                
        </div>

    </div>

    <!-- SCRIPTS -->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/campanas.js"><?php echo '</script'; ?>
>
    <!--script src="js/notificaciones.js"><?php echo '</script'; ?>
-->
    <!-- END SCRIPTS -->
</body>

</html>
<!-- end document-->
<?php }
}
