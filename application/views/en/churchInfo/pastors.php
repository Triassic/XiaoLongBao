<div class="container">
	<div class="col-lg-12">
 		<div class="page-header">
			<h1>Our Staff</h1>
		</div>
		<?php
			foreach ($pastors as $key => $pastor)
			{
				$imgName = $pastor['img'];
				$imgPath = '';
				if (!empty($imgName))
				{
					$imgPath = base_url() . '/assets/img/' . $pastor['img'];
				}
				printf('<div class="row">');
				printf('<div class="col-lg-3">');
				printf('<img class="img-circle pull-right" src="%s" width="130px" height="150px"/>', $imgPath);
				printf('</div>');
				printf('<div class="col-lg-8">');
				printf('<b>%s %s</b><br/>', $pastor['position'], $pastor['name']);
				printf('<i>%s</i><br/>', $pastor['title']);
				if (!empty($pastor['email']))
				{
					printf("<i>%s</i><br/>", $pastor['email']);
				}
				printf('<br/>');
				printf('<p>%s</p>', $pastor['desc']);
				printf('</div></div>');
				printf('<br><br>');
			}
		?>
	</div>
</div>
