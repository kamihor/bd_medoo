<?php
/* Smarty version 3.1.39, created on 2021-09-06 20:23:44
  from 'D:\xampp\htdocs\bd_medoo\app\views\HistoryView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61365cb0784bb0_97455136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55f5cd9140e24209770fc1da934e6e2748375919' => 
    array (
      0 => 'D:\\xampp\\htdocs\\bd_medoo\\app\\views\\HistoryView.tpl',
      1 => 1630952604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61365cb0784bb0_97455136 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_170698623061365cb0773326_56284175', 'footer');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143325096061365cb0773cb7_29154823', 'content');
?>

        
      <?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_170698623061365cb0773326_56284175 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_170698623061365cb0773326_56284175',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Footer -->
    <ul class="copyright">
        Autor: Kamil Horzela
        <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>

<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_143325096061365cb0773cb7_29154823 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_143325096061365cb0773cb7_29154823',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <header id="header">
            <h1 style="white-space: nowrap;">
                <span style="white-space: nowrap;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
            </h1>
            
            <nav id="nav">
        <ul>
             <li style="white-space: nowrap;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcShow" >Oblicz</a>
            </li>
            <li style="white-space: nowrap;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
history" >Historia</a>
            </li>
                        <li style="white-space: nowrap;">
                <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" >wyloguj</a>
            </li>
        </ul>
        
    </nav>
            
    </header>
    <div class="table-wrapper" style="margin: 10em">
    <table id="wynik" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>L.p.</th>
		<th>Kwota</th>
		<th>Liczba lat</th>
		<th>Oprocentowanie</th>
                <th>Rata</th>
		<th>Data</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['d']->value["idresult"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["value"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["years"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["percent"];?>
</td><td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['d']->value["result"]);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["date"];?>
</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
    </div>
    <?php
}
}
/* {/block 'content'} */
}
