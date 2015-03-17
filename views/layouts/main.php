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
			width:940px;
			position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;

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
<body bgcolor="#70a202" 
	  style="background-image:url(http://kesco.co.in/images/bg_img_check.jpg); 
	  background-repeat:repeat-x;" topmargin="0">
<?php $this->beginBody();?>
	<div id="main-body">
	<div id="masthead">
	<div id="top-header"></div>
	<div id="main-header">
		<div class="row">
			<div class="col-sm-3 logo">
				<img src="http://kesco.co.in/images/logo_green.png"/>
			</div>
			<div class="col-sm-3">
				&nbsp;
			</div>
			<div class="col-sm-6 ">
				<h2>Works Management System </h2>
			</div>
		</div>
	
	</div>
	<div id="nav-header">
		
		<?php
		use yii\bootstrap\Nav;
		use yii\bootstrap\NavBar;
use yii\widgets\Menu;

NavBar::begin(['renderInnerContainer'=>false,'options'=>['class'=>'container']]);
echo Nav::widget([
    'items' => [
        ['label' => 'Master Data', 'url' => ['/site/index'],'linkOptions'=>[],'options'=>['class'=>'dropdown']
			,'items'=>['label'=> $this->render('dashboard.php')]],
        ['label' => 'About', 'url' => ['/site/about'],'options'=>['class'=>'dropdown']
			,'items'=>[ 
	['label' => 'About', 'url' => ['/site/about'],'options'=>['class'=>'dropdown']]],
    ],
		Yii::$app->user->isGuest ?
        ['label' => 'Login', 'url' => ['/user/login']] :
        ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
            'url' => ['/user/logout'],
            'linkOptions' => ['data-method' => 'post']],],'options'=>['class'=>'navbar-nav']
]);
NavBar::end();
?>
		
		</div>
	
	</div>
		<div class="content">
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
