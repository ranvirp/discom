<html>
<?php 
\app\assets\AppAsset::register($this);
\app\assets\AppAsset_1::register($this);

?>
<?php $this->beginPage() ?>
<head>
	<?php $this->head();?>
	<?= \yii\helpers\Html::csrfMetaTags() ?>
	<style>
		body
		{
			//background-color: #ed2322;
		}
		.test1
		{
			background-image: url(http://kesco.co.in/images/logo_green.png);
			background-repeat:no-repeat;
		}
		.header
		{
			background-color:#FF0000;
			margin-top: 50px;
			margin-bottom: 50px;
		}
		.row2
		{
			background-color:#FF9900;
		}
		.logo
		{
			float:left;
			padding-left: 50px;
		}
		#top-header
		{
			display:block;
			height:5px;
		}
		#nav-header
		{
			border-top:1px solid #fff;
			background-color:#FF9900;
			min-height:30px;
		}
		.navbar
		{
			background-color: transparent;
			margin-bottom: 0;
			border:0 none!important;
			min-height: 30px;
		}
		.navbar .nav >.dropdown >a 
		{
			padding:8px 10px;
			color:#fff;
		}
		#main-body
		{
			width:100%;
			position: absolute;
            top:0;
            bottom: 10px;
            left: 10px;
            right: 10px;

             margin: auto;
	
		}
		.content
		{
			margin:5px;
			background-color: #fff;
		}
		.dropdown-menu >.row
		{
			width:800px;
		}
	</style>
</head>
<body>
<?php $this->beginBody();?>
	<div id="main-body">
	<div id="masthead">
	<div id="top-header"></div>
	<div id="main-header">
		<div class="row">
			<div class="col-sm-3 logo">
				<img src="http://kesco.co.in/images/logo_green.png"/>
			</div>
			
			<div class="col-sm-6 ">
				<h2>Works Management System </h2>
			</div>
		</div>
	
	</div>
		
		<div class="content container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $content; ?>
					
				</div>
			</div>
		</div>
	</div>
 <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
