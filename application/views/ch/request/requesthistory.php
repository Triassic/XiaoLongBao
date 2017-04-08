<div class="container">
  <div class="row">
    <div class="col-lg-12 well">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/prayer/prayerList'?>">禱告事項</a></li>
        <li class="active"><a href="#">禱告歷史</a></li>
      </ol>

    	<div class="page-header">
      	<h2>禱告歷史</h2>
  	</div>
      <ul class="pagination">
    		<li><a href="#">&laquo;</a></li>
    		<li><a href="#">1</a></li>
    		<li><a href="#">2</a></li>
    		<li><a href="#">3</a></li>
    		<li><a href="#">4</a></li>
    		<li><a href="#">5</a></li>
    		<li><a href="#">&raquo;</a></li>
  	</ul>
      <table class="table table-striped table-hover">
        <thead><th>時間</th><th>章節</th><th>經文</th></thead>
        <tbody>
        	<?php
        		foreach ($requests as $key => $request) {
        			printf("<tr>");
        			printf('<td style="width: %s">%s</td>', '20%', $request['date']);
              printf('<td style="width: %s">%s</td>', '20%', $request['chapter']);
              printf('<td style="width: %s">%s</td>', '60%', $request['verse']);
        			printf("</tr>");
        		}
        	?>
        </tbody>
      </table>
      <ul class="pagination">
    		<li><a href="#">&laquo;</a></li>
    		<li><a href="#">1</a></li>
    		<li><a href="#">2</a></li>
    		<li><a href="#">3</a></li>
    		<li><a href="#">4</a></li>
    		<li><a href="#">5</a></li>
    		<li><a href="#">&raquo;</a></li>
  	</ul>
    </div>
  </div>
</div>
