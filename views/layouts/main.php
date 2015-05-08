<html class="csstransforms no-csstransforms3d csstransitions">
<?php 
\app\assets\AppAsset::register($this);
\app\assets\AppAsset_1::register($this);

?>
<?php $this->beginPage() ?>
<head>
	<?php $this->head();?>
	<?= \yii\helpers\Html::csrfMetaTags() ?>

</head>
<body >
<?php $this->beginBody();?>
	<div role="navigation" class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.html" class="navbar-brand">
          Works Monitoring System for KESCO
			</a>
        </div>
     <div class="navbar-collapse collapse navbar-right">   
		<?php
		use yii\bootstrap\Nav;
		use yii\bootstrap\NavBar;
use yii\widgets\Menu;
echo Nav::widget([
    'items' => [
       ['label' => 'Android APK', 'url' => Yii::getAlias('@web').'/android/latest/GPSPhotoUploader.apk'],
        ['label' => 'Master Data', 'url' => ['/site/index'],'linkOptions'=>[],'options'=>['class'=>'dropdown']
			,'items'=>[
			 ['label' => 'Designation', 'url' => ['/masterdata/designation/create'],'options'=>['class'=>'dropdown']],
			 ['label' => 'DesignationType', 'url' => ['/masterdata/designationtype/create'],'options'=>['class'=>'dropdown']],
			  ['label' => 'Division', 'url' => ['/division/create'],'options'=>['class'=>'dropdown']],
			 ['label' => 'Substation', 'url' => ['/substation/create'],'options'=>['class'=>'dropdown']],
			 ['label' => 'Circle', 'url' => ['/circle/create'],'options'=>['class'=>'dropdown']],
			
			
				
			]],
        ['label' => 'Data Entry', 'url' => ['#'],'options'=>['class'=>'dropdown']
			,'items'=>[ 
	            ['label' => 'Work', 'url' => ['/work/create'],'options'=>['class'=>'dropdown']],
				['label' => 'Work Progress', 'url' => ['/work/addwp'],'options'=>['class'=>'dropdown']],
	            ['label' => 'Add Material Requirement', 'url' => ['/work/addmq'],'options'=>['class'=>'dropdown']]
			],
    ],
		        ['label' => 'Reports', 'url' => ['#'],'options'=>['class'=>'dropdown']
			,'items'=>[ 
	            ['label' => 'List of Works Scheme wise', 'url' => ['/report?rt=r2'],'options'=>['class'=>'dropdown']],
				['label' => 'List of Schemes', 'url' => ['/report?rt=r1'],'options'=>['class'=>'dropdown']],
	            ['label' => 'Divisions', 'url' => ['/division/index'],'options'=>['class'=>'dropdown']],
				['label' => 'Material Requirements Scheme Wise', 'url' => ['/report?rt=r3'],'options'=>['class'=>'dropdown']],
                ['label' => 'Material Requirements Work Wise', 'url' => ['/report?rt=r4'],'options'=>['class'=>'dropdown']],        
	             ['label' => 'Latest Photos of Breakdown', 'url' => ['/photo/latest?cat=br'],'options'=>['class'=>'dropdown']],        
	            ['label' => 'Latest Photos of Theft', 'url' => ['/photo/latest?cat=t'],'options'=>['class'=>'dropdown']],        
	            ['label' => 'Latest Photos of Work', 'url' => ['/photo/latest?cat=w'],'options'=>['class'=>'dropdown']],        
	           
	            ['label' => 'Exception Reports', 'url' => ['/work/index'],'options'=>['class'=>'dropdown']],

			],
    ],
		
		Yii::$app->user->isGuest ?
        ['label' => 'Login', 'url' => ['/user/login']] :
        ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
            'url' => ['/user/logout'],
            'linkOptions' => ['data-method' => 'post']],],'options'=>['class'=>'navbar-nav']
]);
?>
	</div>	
		</div>
	</div>
	<div id="mainbody">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 contentcontainer">
				    <?php echo $content; ?>
					
				</div>
			</div>
		</div>
		</div>
	
 <?php $this->endBody() ?>
 <style>
 .contentcontainer
 {
 padding:10px;
 }
 #mainbody
 {
   min-height:550px;
   padding-bottom:0;
   padding-top:100px;
   }
 }
 </style>
    </body>
    	
    </html>
    <?php $this->endPage() ?>
