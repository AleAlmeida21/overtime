<?php
/* Smarty version 3.1.33, created on 2021-08-24 17:38:21
  from '/home/grouaknd/public_html/Campanas/templates/Admin/comun/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_612558bdbe8749_19725074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a86f9d8d1e0618f9886f4ec76ff4cd3aa225ebec' => 
    array (
      0 => '/home/grouaknd/public_html/Campanas/templates/Admin/comun/menu.tpl',
      1 => 1629837216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_612558bdbe8749_19725074 (Smarty_Internal_Template $_smarty_tpl) {
?>        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li <?php if ($_smarty_tpl->tpl_vars['paginaActual']->value == "principal.php") {?>class="active has-sub"<?php }?>>
                            <a class="js-arrow" href="principal.php">
                                <i class="fas fa-tachometer-alt"></i>Principal</a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['rol']->value == "A") {?>
                            <li <?php if ($_smarty_tpl->tpl_vars['paginaActual']->value == "acceso.php") {?>class="active has-sub"<?php }?>>
                                <a href="acceso.php">
                                    <i class="fas fa-key"></i>Accesos FB</a>
                            </li>                            
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
                </nav>
            </div>
        </aside><?php }
}
