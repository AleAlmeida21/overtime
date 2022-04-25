<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:40:00
  from '/home/grouaknd/public_html/Campanas/templates/Admin/campana.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6125592005e8a2_00610526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c2c0d2db946bc970beb2baee4ba5fb7550948bd' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/campana.tpl',
      1 => 1629837206,
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
function content_6125592005e8a2_00610526 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" href="js/vendor/jquery-ui/jquery-ui.css">
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
                                        <strong>Campaña</strong> Mantenimiento
                                    </div>
                                    <div class="card-body card-block">
                                        <form>
                                            <input type="hidden" name="accion" id="accion" value="<?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
">
                                            <div class="row form-group">
                                                <?php if ($_smarty_tpl->tpl_vars['accion']->value != "a") {?>
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">ID de Campaña (autogenerado)</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" name="campId" placeholder="ID de Campaña" class="form-control" id="campId" value="<?php echo $_smarty_tpl->tpl_vars['campId']->value;?>
" readonly="readonly">
                                                    </div>
                                                <?php }?>                                                
                                            </div>                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Agencia</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select type="text" name="campAgencia" placeholder="Agencia" class="form-control" id="campAgencia" disabled="disabled">
                                                        <option value="">Seleccione Agencia</option>
                                                        <option value ="MINDSHARE" <?php if ($_smarty_tpl->tpl_vars['campAgencia']->value == "MINDSHARE") {?>selected="selected"<?php }?>>MINDSHARE</option>
                                                        <option value ="WAVEMAKER" <?php if ($_smarty_tpl->tpl_vars['campAgencia']->value == "WAVEMAKER") {?>selected="selected"<?php }?>>WAVEMAKER</option>
                                                        <option value ="MEDIACOM" <?php if ($_smarty_tpl->tpl_vars['campAgencia']->value == "MEDIACOM") {?>selected="selected"<?php }?>>MEDIACOM</option>
                                                        <option value ="WUNDERMAN" <?php if ($_smarty_tpl->tpl_vars['campAgencia']->value == "WUNDERMAN") {?>selected="selected"<?php }?>>WUNDERMAN</option>
                                                        <option value ="MSIX" <?php if ($_smarty_tpl->tpl_vars['campAgencia']->value == "MSIX") {?>selected="selected"<?php }?>>MSIX</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Cliente</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="cliId" id="cliId" class="form-control">
                                                        <option value="0" <?php if ($_smarty_tpl->tpl_vars['cliId']->value == 0) {?>Selected="Selected"<?php }?>>Sin cliente asociado</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'cliente');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliId;?>
" <?php if ($_smarty_tpl->tpl_vars['cliente']->value->cliId == $_smarty_tpl->tpl_vars['cliId']->value) {?>Selected="Selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cliente']->value->cliNombre;?>
</option>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    </select>
                                                </div>
                                            </div>                                                
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nombre</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="campNombre" placeholder="Nombre" class="form-control" id="campNombre" value="<?php echo $_smarty_tpl->tpl_vars['campNombre']->value;?>
">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Fecha de Solicitud</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="campFecSol" placeholder="Fecha de solicitud" class="form-control" id="campFecSol" value="<?php echo $_smarty_tpl->tpl_vars['campFecSol']->value;?>
">
                                                </div>
                                            </div>    
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Inversión USD</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="campInvers" placeholder="Inversión USD" class="form-control" id="campInvers" value="<?php echo $_smarty_tpl->tpl_vars['campInvers']->value;?>
" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                               <?php if ($_smarty_tpl->tpl_vars['accion']->value != "a") {?>
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Campaña FB ID</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" name="campIdFb" placeholder="FB Id" class="form-control" id="campIdFb" value="<?php echo $_smarty_tpl->tpl_vars['campIdFb']->value;?>
">
                                                    </div>
                                               <?php }?>
                                            </div>                                                  
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Estado</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select type="text" name="campEstado " placeholder="Estado" class="form-control" id="campEstado">
                                                        <option value="Sin Implementar" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Sin Implementar") {?>selected="selected"<?php }?>>Sin Implementar</option>
                                                        <option value ="Implementada" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Implementada") {?>selected="selected"<?php }?>>Implementada</option>
                                                        <option value ="Chequeada" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Chequeada") {?>selected="selected"<?php }?>>Chequeada</option>
                                                        <option value ="Error" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Error") {?>selected="selected"<?php }?>>Error</option>
                                                        <option value ="Terminada" <?php if ($_smarty_tpl->tpl_vars['campEstado']->value == "Terminada") {?>selected="selected"<?php }?>>Terminada</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr/>
                                            <!-- COMIENZO DETALLE -->                                                
                                            <div class="table-data__tool">
                                                <div class="table-data__tool-left">
                                                    PLAN DE MEDIOS
                                                </div>
                                                <div class="table-data__tool-right">                                           
                                                    <div  class="btn btn-secondary btn-sm au-btn--green" id="btnAgregar">
                                                    <i class="zmdi zmdi-plus"></i>agregar nuevo</div>
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
                                                            <th>Ubicación</th>
                                                            <th>Medio</th>
                                                            <th>Dispositivo</th>
                                                            <th>Formato</th>
                                                            <th>Inicio</th>
                                                            <th>Final</th>
                                                            <th>Adserver</th>
                                                            <th>Inversión</th>
                                                            <th>KPI</th>
                                                            <th>Objetivo</th>
                                                            <!--th>FB ID</th-->
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="cuerpo">
            
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- FIN DETALLE -->
                                            <hr/>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Landing</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="campLanding" placeholder="Landing URL" class="form-control" id="campLanding" value="<?php echo $_smarty_tpl->tpl_vars['campLanding']->value;?>
">
                                                </div>
                                            </div>                                                  
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Target y Comentarios Adicionales</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea rows="4" name="campTargComent" class="form-control" id="campTargComent"><?php echo $_smarty_tpl->tpl_vars['campTargComent']->value;?>
</textarea>
                                                </div>
                                            </div>                                                 
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">
                                            <i class="fa fa-save"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" id="btnChequear">
                                            <i class="fa fa-check"></i> Chequear
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
                        <!-- FORMULARIO PLAN DE MEDIOS -->
                        <div id="dialog">

                        </div>                        
                        <div class="card-body card-block" id="planMedios" style="display:none">
                            <form>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Ubicación</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="plaUbicacion" placeholder="Ubicación" class="form-control" id="plaUbicacion">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Medio</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="plaMedio" placeholder="Medio" class="form-control" id="plaMedio">
                                            <option value="Facebook">Facebook</option>
                                            <option value="Mediamath">Mediamath</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Snapchat">Snapchat</option>
                                            <option value="Twitch">Twitch</option>
                                            <option value="Google Search">Google Search</option>
                                            <option value="Google Youtube">Google Youtube</option>
                                            <option value="Google Display">Google Display</option>
                                        </select>
                                    </div>
                                </div>     
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Dispositivo</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="plaDispositivo" placeholder="Dispositivo" class="form-control" id="plaDispositivo">
                                            <option value="Mobile">Mobile</option>
                                            <option value="Desktop">Desktop</option>
                                            <option value="Cross-device">Cross-device</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Formato</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="plaFormato" placeholder="Formato" class="form-control" id="plaFormato">
                                            <option value="Display">Display</option>
                                            <option value="Video">Video</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Ini.Camp.</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="plaIniCamp" placeholder="Inicio Campaña" class="form-control" id="plaIniCamp">
                                    </div>
                                </div>                                 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Fin Camp.</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="plaFinCamp" placeholder="Fin Campaña" class="form-control" id="plaFinCamp">
                                    </div>
                                </div>                                  
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Adserver</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="plaAdServ" placeholder="Ad Server" class="form-control" id="plaAdServ">
                                            <option value="No">No</option>
                                            <option value="Sizmek">Sizmek</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Inversión</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="plaInversion" placeholder="Inversión" class="form-control" id="plaInversion">
                                    </div>
                                </div>  
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">KPI</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="plaKPI" placeholder="KPI" class="form-control" id="plaKPI">
                                            <option value="CPC">CPC</option>
                                            <option value="REACH">REACH</option>
                                            <option value="CPL/CPA">CPL/CPA</option>
                                            <option value="CPM">CPM</option>
                                            <option value="CPI/CPE">CPI/CPE</option>
                                            <option value="CPV">CPV</option>
                                            <option value="AD RECALL">AD RECALL</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="row form-group" style="display:none">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Objetivo</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="plaObjetivo" placeholder="Objetivo" class="form-control" id="plaObjetivo" value="0">
                                    </div>
                                </div>   
                                <?php if ($_smarty_tpl->tpl_vars['accion']->value != "a") {?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Conj.Anunc. FB ID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="plaConjAnFB" placeholder="FB Id" class="form-control" id="plaConjAnFB" value="<?php echo $_smarty_tpl->tpl_vars['plaConjAnFB']->value;?>
">
                                        </div>
                                    </div>   
                                <?php }?>
                            </form>
                            <div class="card-footer" style=" background-color: #ffffff; text-align: right">
                                <button type="button" class="btn btn-secondary btn-sm" id="btnGuardarMedio">
                                    <i class="fa fa-save"></i> Guardar
                                </button>
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
 type="text/javascript" src="js/vendor/jquery-ui/jquery-ui.js"><?php echo '</script'; ?>
>        
        <?php echo '<script'; ?>
 type="text/javascript" src="js/campana.js"><?php echo '</script'; ?>
>
        <!--script src="js/notificaciones.js"><?php echo '</script'; ?>
-->
        <?php echo '<script'; ?>
>
             var lineas = [];             
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaPlanCampanas']->value, 'temporal');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['temporal']->value) {
?>
                var linea = {};
                linea['plaId']=<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaId;?>
;
                linea['campId']=<?php echo $_smarty_tpl->tpl_vars['temporal']->value->campId;?>
;
                linea['plaUbicacion']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaUbicacion;?>
';
                linea['plaMedio']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaMedio;?>
';
                linea['plaDispositivo']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaDispositivo;?>
';
                linea['plaFormato']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaFormato;?>
';
                linea['plaIniCamp']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaIniCamp;?>
';
                linea['plaFinCamp']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaFinCamp;?>
';
                linea['plaAdServ']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaAdServ;?>
';
                linea['plaInversion']=<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaInversion;?>
;
                linea['plaKPI']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaKPI;?>
';
                linea['plaObjetivo']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaObjetivo;?>
';
                linea['plaConjAnFB']='<?php echo $_smarty_tpl->tpl_vars['temporal']->value->plaConjAnFB;?>
';
                lineas.push(linea);
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            cargoLineas();
        <?php echo '</script'; ?>
>    
    <!-- END SCRIPTS -->


</body>

</html>
<!-- end document-->
<?php }
}
