<?php
/* Smarty version 3.1.33, created on 2021-08-23 15:08:24
  from '/home/grouaknd/public_html/Campanas/templates/Admin/clientes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6123e4181704b8_72877786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9feb007424b5dd6ea3e27e209027e4468b779a51' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/clientes.tpl',
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
function content_6123e4181704b8_72877786 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <?php $_smarty_tpl->_subTemplateRender('file:Admin/comun/metatags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <!-- Title Page-->
    <title>Campañas - Clientes</title>

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
                                <h3 class="title-5 m-b-35">Clientes</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <!--div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button-->
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" id="btnAgregar">
                                            <i class="zmdi zmdi-plus"></i>agregar Cliente</button>
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
                                                <th>Nombre</th>
                                                <th>Agencia</th>
                                                <th>FB ID</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'cliente');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
?>
                                                <tr class="tr-shadow">
                                                    <!--td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliId;?>
">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td-->
                                                    <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliNombre;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliAgencia;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliFbId;?>
</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item btnEditar" data-toggle="tooltip" data-placement="top" title="Editar" alt="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliId;?>
">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>                                                            
                                                            <button type="button" data-placement="top" title="Borrar" alt="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliId;?>
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
            <!-- modal small -->
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
 type="text/javascript" src="js/clientes.js"><?php echo '</script'; ?>
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
