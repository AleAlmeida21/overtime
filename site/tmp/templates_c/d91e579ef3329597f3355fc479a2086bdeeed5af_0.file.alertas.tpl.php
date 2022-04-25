<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:21
  from '/home/grouaknd/public_html/Campanas/templates/Admin/comun/alertas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558bdbf8ea5_19335608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd91e579ef3329597f3355fc479a2086bdeeed5af' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/comun/alertas.tpl',
      1 => 1629837214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_612558bdbf8ea5_19335608 (Smarty_Internal_Template $_smarty_tpl) {
?>                                        <i class="zmdi zmdi-notifications"></i>
                                        <?php if ($_smarty_tpl->tpl_vars['cantidad']->value > 0) {?><span class="quantity" id="cantidadNotificaciones"><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</span><?php }?>
                                        <div class="notifi-dropdown js-dropdown" id="contenedorNotif">
                                            <div class="notifi__title">
                                                <p>Hay <?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
 Notifiacione/s</p>
                                            </div>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notificaciones']->value, 'notificacion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['notificacion']->value) {
?>
                                                    <div class="notifi__item">
                                                        <div class="<?php if ($_smarty_tpl->tpl_vars['notificacion']->value['notTexto'] == "Se autorizó la pieza") {?>bg-c1<?php } else {
if ($_smarty_tpl->tpl_vars['notificacion']->value['notTexto'] == "Se Rechazó la pieza") {?>bg-c2<?php } else { ?>bg-c3<?php }
}?> img-cir img-40">
                                                            <i class="zmdi <?php if ($_smarty_tpl->tpl_vars['notificacion']->value['notTexto'] == "Se autorizó la pieza") {?>zmdi-thumb-up<?php } else {
if ($_smarty_tpl->tpl_vars['notificacion']->value['notTexto'] == "Se Rechazó la pieza") {?>zmdi-thumb-down<?php } else { ?>zmdi-spinner<?php }
}?>"></i>
                                                        </div>
                                                        <div class="content">
                                                            <p><a href="verPieza.php?id=<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['pieId'];?>
&ca=<?php echo $_smarty_tpl->tpl_vars['camId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['notificacion']->value['notiQuien'];?>
: <?php echo $_smarty_tpl->tpl_vars['notificacion']->value['notTexto'];?>
 <?php echo $_smarty_tpl->tpl_vars['notificacion']->value['pieNombre'];?>
 (<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['camNombre'];?>
)</a></p>
                                                            <p><?php echo $_smarty_tpl->tpl_vars['notificacion']->value['notObserv'];?>
</p>
                                                            <button type="button" class="btn btn-sm btn-outline-success btnAceptarNoti" alt="<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['notId'];?>
" >
                                                                <small style="font-size: xx-small">Aceptar</small>
                                                            </button>                                                            
                                                            <span class="date">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['notFecHor'];?>
</span>
                                                        </div>
                                                    </div>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            <!--div class="notifi__footer">
                                                <a href="#">Todas las Notificaciones</a>
                                            </div-->
                                        </div>
                                            
<?php }
}
