<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/css/grid.css">
	<link rel="stylesheet" href="/css/main.css">
	<style>
		#debug-panel {
			background-color: #111111;
			padding: 10px;
			border: 5px solid #11bbaa;
		}
	</style>
</head>
<body>
	<div id="debug-panel">
		<div>REQUEST_URI: <?=$_SERVER['REQUEST_URI']?></div>
		<div>SERVER PID: </div>
		<div>APP PID: </div>
	</div>

	<div>
		<a href="/">home</a>
		<a href="/login">login</a>
		<a href="/status">status</a>
		<a href="/cataloge">cataloge</a>
		<a href="/cataloge/26">cataloge 26</a>
		<a href="/cataloge/102">cataloge 102</a>
		<a href="/cataloge/php/255">cataloge php/255</a>
		<a href="/exit">exit</a>
	</div>
		
	<div id="root">
		<h3><?php echo \Pa\Pa::t('title'); ?></h3>
		<div>
			<?php echo \Pa\Pa::t('page'); ?>
		</div>
	</div>

	<script src="/phpapplication.js"></script>
</body>
</html>
