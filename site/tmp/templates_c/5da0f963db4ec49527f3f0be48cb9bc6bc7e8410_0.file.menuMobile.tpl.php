<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:21
  from '/home/grouaknd/public_html/Campanas/templates/Admin/comun/menuMobile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558bdbe1ca0_18752552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5da0f963db4ec49527f3f0be48cb9bc6bc7e8410' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/comun/menuMobile.tpl',
      1 => 1629837215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_612558bdbe1ca0_18752552 (Smarty_Internal_Template $_smarty_tpl) {
?>        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li <?php if ($_smarty_tpl->tpl_vars['paginaActual']->value == "principal.php") {?>class="active has-sub"<?php }?>>
                            <a class="js-arrow" href="principal.php">
                                <i class="fas fa-tachometer-alt"></i>Principal</a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['rol']->value == "A") {?>
                            <li <?php if ($_smarty_tpl->tpl_vars['paginaActual']->value == "usuarios.php") {?>class="active has-sub"<?php }?>>
                                <a href="usuarios.php">
                                    <i class="fas fa-user-secret"></i>Usuarios</a>
                            </li>
                        <?php }?>
                        <li <?php if ($_smarty_tpl->tpl_vars['paginaActual']->value == "clientes.php") {?>class="active has-sub"<?php }?>>
                            <a href="clientes.php">
                                <i class="fas fa-users"></i>Clientes</a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['paginaActual']->value == "campanas.php") {?>class="active has-sub"<?php }?>>
                            <a href="campanas.php">
                                <i class="far fa-files-o"></i>Campañas</a>
                        </li>                        
                    </ul>
                </div>
            </nav>
        </header><?php }
}
