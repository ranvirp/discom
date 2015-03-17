
<div class="reply_wrapper well">
	<div class="reply_head small">
		<span><?php $user=\app\models\User::find()->where(['id'=>$reply->author_id])->one();
			echo $user?$user->username:'';?></span><span class="bullet">.</span>
		<span> <?=\kartik\helpers\Enum::timeElapsed(date("F j, Y, g:i a",$reply->create_time))?></span>
		
	</div>
	<div class="reply-content small">
		<div class="row">
			<div class="col-md-8">
		<?=$reply->content?>
			</div>
		<div class="col-md-4 pull-right">
			<?=\app\models\File::showAttachmentsInline($reply,'attachments')?>
		</div>
		</div>
	</div>
	
</div>


