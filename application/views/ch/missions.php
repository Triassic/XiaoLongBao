<div class="container">
  <div class="row">
    <div class="col-lg-12 well">
      <h2>宣教士</h2>
      我們所支持的宣教士
      <hr>
      <table class="table table-striped table-hover">
        <thead><tr><th>宣教士</th><th>機構</th><th>宣教國家/城市</th><th></th></tr></thead>
        <tbody>
        	<?php
        	/*
        	  mw: Sample of a modal.

        	  <tr data-toggle="modal" data-target="#missionModal1">
         	  <td>Audrey Tom</td><td></td><td>美國, 加州大學聖地亞哥分校</td>
  		  <!-- Modal -->
  		  <div class="modal fade" id="missionModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    		    <div class="modal-dialog">
      		  <div class="modal-content">
        		    <div class="modal-header">
         			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          		  <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        			</div>
        			<div class="modal-body">
          	  	...
        		  	</div>
        		  	<div class="modal-footer">
          	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		  	</div>
      		  </div><!-- /.modal-content -->
    			</div><!-- /.modal-dialog -->
  		  </div><!-- /.modal -->
          </tr>
        	*/
        	foreach ($missionaries as $id => $missionary) {

        		$imgName = $missionary['img'];
        		$imgPath = '';
        		if (!empty($imgName))
        		{
        			$imgPath = base_url() . '/assets/img/' . $missionary['img'];
        		}

        		// mw: table row
        		printf("<tr data-toggle=\"modal\" data-target=\"#missionModal%s\">", $id);

        		// mw: boostrap modal
        		printf("<td>%s</td><td>%s</td><td>%s</td>", $missionary['name'], $missionary['organization'], $missionary['country']);
        		printf("<div class=\"modal fade\" id=\"missionModal%s\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">", $id);
        		printf("<div class=\"modal-dialog\">");
        		printf("<div class=\"modal-content\">");

        		// mw: boostrap modal header
        		printf("<div class=\"modal-header\">");
        		printf("<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>");
        		printf("<h4 class=\"modal-title\" id=\"myModalLabel\">%s</h4>", $missionary['name']);
        		printf("</div>");

        		// mw: message body: photo and description
        		printf("<div class=\"modal-body\">");
        		if (!empty($imgPath))
        		{
        			printf("<img src=\"%s\"/>", $imgPath);
        		}
        		printf($missionary['desc']);
        		printf("</div>");

        		// mw: boostrap modal footer.
        		printf("<div class=\"modal-footer\">");
      		printf("<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>");
      		printf("</div></div></div></div>");
        	}
        	?>
        </tbody>
      </table>
      <br>
      <br>
      <h2>福音機構</h2>
      我們所支持的福音機構
      <hr>
      <table class="table table-striped table-hover">
        <tbody>
          <tr><td>緬甸聖道神學院</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
