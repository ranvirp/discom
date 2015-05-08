<?php

use yii\bootstrap\Nav;
echo Nav::widget(
	['options'=>['class'=>'navbar-nav'],'items'=>[
		['label'=>'Division','items'=>[
			['label'=>'Create','url'=>['division/create']]
		]]
		]]);

