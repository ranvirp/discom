<html>
<?php 
\app\assets\AppAsset::register($this);
\app\assets\AppAsset_1::register($this);

?>
<?php $this->beginPage() ?>
<head>
	<?php $this->head();?>
	<?= \yii\helpers\Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody();?>
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">KESCO</a>
				       </div>
			<?= $this->render('toplinks.php') ?>
            <?= $this->render('sidebar.php') ?>
            <!-- /.navbar-header -->
			
		</nav>
</div>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $content; ?>
				</div>
			</div>
		</div>


 <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
