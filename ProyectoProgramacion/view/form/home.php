	<style type="text/css">
		html,body{
			height: 100%;
	    	margin: 0px;
		}
		.contenido{
			float: right;
			height: 83%;
			width: 85%;
			overflow-y: auto;
			overflow-x: hidden;
			padding: 5px;
		}
		#alert{
			position: relative;
			z-index: 3;
		}
		.menu{
			height: 15%;
			padding: 0px;
			width: auto;
		}
		.nav_izq{
			padding: 5px;
			width: 15%;
			max-width: 15%;
			height: 83%;
			float: left;
			
		}
	</style>
	<body>
		<header class="menu">
			<nav style="width: 100%; margin: 0px;" class="navbar navbar-default">
	  			<div class="container-fluid">
	  				<div class="navbar-header">
	  					<button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
	  						<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<a href="app.php" class="navbar-brand">Biomedicina IPS</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
						<p class="navbar-text navbar-right"><a href="?LogOut" class="navbar-link">Cerrar Sesion</a></p>
					</div>
				</div>
			</nav>
			<div id="alert"></div>
		</header>
		
		<nav class="nav_izq">
			<ul class="nav nav-pills nav-stacked">
				<?php
					foreach ($menu as $key => $value) {
						$active = "";
						$s = explode(",", $key);
						$i = 0;
						$url = "";
						foreach ($s as $key2 => $value2) {
							if($key2==0)
								$url.=$value2;
							else
								$url.="&".$value2;
							if(isset($_GET[$value2])){
								$i++;
							}
						}
						if($i>0){
							$active = 'class="active"';
						}
						echo '<li role="presentation"'.$active.'><a href="?'.$url.'">'.$value.'</a></li>';
					}
				?>
			</ul>
		</nav>
		<section class="contenido">
			<?php
				foreach ($form as $key => $value) {
					$s = explode(",", $key);
					$i = 0;
					foreach ($s as $key2 => $value2) {
						if(isset($_GET[$value2])){
							$i++;
						}
					}
					if($i==count($s) && $i==count($_GET)){
						include_once $value;
					}
				}
			?>
		</section>
