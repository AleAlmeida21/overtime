<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:21
  from '/home/grouaknd/public_html/Campanas/templates/Admin/comun/account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558bdbfeea8_57997562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '589642a3cd9bb42e48c61e237f862861bbae8748' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/comun/account.tpl',
      1 => 1629837213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_612558bdbfeea8_57997562 (Smarty_Internal_Template $_smarty_tpl) {
?>                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="Usuario" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_smarty_tpl->tpl_vars['SusuId']->value;?>
</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="Usuario" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_smarty_tpl->tpl_vars['SusuId']->value;?>
</a>
                                                    </h5>
                                                    <span class="email"><?php echo $_smarty_tpl->tpl_vars['SusuCorreo']->value;?>
</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="cambioPass.php">
                                                        <i class="zmdi zmdi-key"></i>Cambio Clave</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Salir</a>
                                            </div>
                                        </div>
                                    </div><?php }
}
