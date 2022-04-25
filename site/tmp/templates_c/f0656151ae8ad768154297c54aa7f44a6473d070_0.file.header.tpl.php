<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:21
  from '/home/grouaknd/public_html/Campanas/templates/Admin/comun/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558bdbec185_29601172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0656151ae8ad768154297c54aa7f44a6473d070' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/comun/header.tpl',
      1 => 1629837215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/comun/alertas.tpl' => 1,
    'file:Admin/comun/account.tpl' => 1,
  ),
),false)) {
function content_612558bdbec185_29601172 (Smarty_Internal_Template $_smarty_tpl) {
?>            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <!--input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button-->
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                                                        <div class="noti__item js-item-menu">
                                        <?php $_smarty_tpl->_subTemplateRender("file:Admin/comun/alertas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                                    </div>
                                </div>
                                                                <div class="account-wrap">
                                    <?php $_smarty_tpl->_subTemplateRender("file:Admin/comun/account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                              
            </header><?php }
}
