<div class="container">
	<div class="row well">
		<br> <br>
		<div class="col-lg-10 col-lg-offset-1">
			<?php echo validation_errors(); ?>
			<form class="form-horizontal form-prayer" role="form" method="post"
				accept-charset="utf-8"
				action="<?php echo site_url() .'/prayer/addprayer/'  ?>">
				<div class="prayscripture">
				  <h5>同聲朗讀經文</h5>
				  <textarea class="textbox-prayscripture" name="scripture"><?php echo set_value('scripture'); ?></textarea>
				</div>
				<?php
				$currentSection = 0;
				$currentSectionIndex = -1;
				foreach ($items as $key => $item)
				{
					if($item['section_id'] > $currentSection)
					{
						if($currentSection > 0)
						{
							printf('</ol></ul>');
						}
						$currentSection = $item['section_id'];
						$currentSectionIndex += 1;
						printf('<ul>');
						printf('%c. %s', ord('A') + $currentSectionIndex, $item['section_name'] );
						printf('<ol>');
					}
					?>
				<li class="li-prayer">
					<textarea class="textbox-prayer" name="prayItems[]"><?php echo $item['item_name'] ?></textarea>
					<a class="btn btn-danger btn-deleteprayer" href="#">
	  					<i class="icon-trash icon-white"></i>
	 					刪除
					</a>
					<a class="btn btn-success btn-addprayer" href="#">
	  					<i class="icon-trash icon-white"></i>
	 					添加
					</a>
					<input type="hidden" name="prayItemSections[]" value="<?php echo set_value('prayItemSections[]', (string)$currentSection); ?>" />
				</li>
				<?php
				}
				if($currentSection > 0)
				{
					printf('</ol></ul>');
				}
				?>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-info">提交</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
