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
NavBar::begin(['renderInnerContainer'=>false,'options'=>['style'=>'background-color:#000023;']]);
?>
		<div class="pull-right">
			<a href="<?=\yii\helpers\Url::to(['/site/apk'])?>">Latest APK </a>
		</div>
<?php
NavBar::end();
NavBar::begin(['renderInnerContainer'=>false,'options'=>['class'=>'container']]);
echo Nav::widget([
    'items' => [
        ['label' => 'Master Data', 'url' => ['/site/index'],'linkOptions'=>[],'options'=>['class'=>'dropdown']
			,'items'=>['label'=>Yii::$app->user->isGuest?'': $this->render('/site/dashboard_operator')]],
        ['label' => 'Data Entry', 'url' => ['#'],'options'=>['class'=>'dropdown']
			,'items'=>[ 
	            ['label' => 'Work', 'url' => ['/work/create'],'options'=>['class'=>'dropdown']],
				['label' => 'Work Progress', 'url' => ['/work/index'],'options'=>['class'=>'dropdown']],
	            ['label' => 'Add Comments', 'url' => ['/work/create'],'options'=>['class'=>'dropdown']]
			],
    ],
		        ['label' => 'Reports', 'url' => ['#'],'options'=>['class'=>'dropdown']
			,'items'=>[ 
	            ['label' => 'List of Works Scheme wise', 'url' => ['/report?rt=r2'],'options'=>['class'=>'dropdown']],
				['label' => 'List of Schemes', 'url' => ['/report?rt=r1'],'options'=>['class'=>'dropdown']],
	            ['label' => 'Divisions', 'url' => ['/division/index'],'options'=>['class'=>'dropdown']],
				['label' => 'Material Requirements Scheme Wise', 'url' => ['/report?rt=r3'],'options'=>['class'=>'dropdown']],
                ['label' => 'Material Requirements Work Wise', 'url' => ['/report?rt=r4'],'options'=>['class'=>'dropdown']],        
	            ['label' => 'Exception Reports', 'url' => ['/work/index'],'options'=>['class'=>'dropdown']],

			],
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
