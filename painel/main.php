<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/jquery-ui.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Datepicker/dist/css/default/zebra_datepicker.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
</head>
<body>

<base base="<?php echo INCLUDE_PATH_PAINEL; ?>" />
<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
		<?php
			if($_SESSION['img'] == ''){
		?>
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!--avatar-usuario-->
		<?php }else{ ?>
			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
			</div><!--avatar-usuario-->
		<?php } ?>
		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome']; ?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
		</div><!--nome-usuario-->
	</div><!--box-usuario-->
	<div class="items-menu">
		<h2>Administração</h2>
		<a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
		<a <?php selecionadoMenu('cadastrar-produtos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-produtos">Cadastrar Produtos</a>
		<a <?php selecionadoMenu('visualizar-produtos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>visualizar-produtos">Visualizar Produtos</a>
		<a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
		<a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
		<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
		<a <?php selecionadoMenu('gerenciar-clientes'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-clientes">Gerenciar Clientes</a>
	</div><!--items-menu-->
	</div><!--menu-wraper-->
</div><!--menu-->

<header>
	<div class="center">
		<div class="menu-btn">
			<i class="fa fa-bars"></i>
		</div><!--menu-btn-->

		<div class="loggout">
			<a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
		</div><!--loggout-->

		<div class="clear"></div>
	</div>
</header>

<div class="content">
	<?php 
		Painel::carregarPagina(); 
	?>
</div><!--content-->

<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<?php Painel::loadJS(array('jquery-ui.min.js'),'listar-empreendimentos'); ?>
<script src="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Datepicker/dist/zebra_datepicker.min.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.maskMoney.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.ajaxform.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
  	selector:'.tinymce',
  	plugins: "image",
  	height:300
   });
  </script>
  <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/helperMask.js"></script>
  <?php Painel::loadJS(array('ajax.js'),'gerenciar-clientes'); ?>
  <?php Painel::loadJS(array('ajax.js'),'cadastrar-clientes'); ?>
  <?php Painel::loadJS(array('ajax.js'),'editar-cliente'); ?>
  <?php Painel::loadJS(array('controleFinanceiro.js'),'editar-cliente'); ?>
   <?php Painel::loadJS(array('empreendimentos.js'),'listar-empreendimentos'); ?>
     <?php Painel::loadJS(array('chat.js'),'chat'); ?>
       <?php Painel::loadJS(array('calendario.js'),'calendario'); ?>
</body>
</html>