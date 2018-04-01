<div class="container">
  <div class="well well-half">
    <div class="row">
      <div class="col-lg-4">
        <h3>經文 <?php echo Bible::convertEngRangesToCh($video['scripture'], false);?></h3>
      </div>
      <div class="col-lg-8">
        <h3><?php echo $video['title']; ?></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div id="scroll_panel">
        	<?php echo $verses; ?>
        </div>
      </div>
      <div class="col-lg-8">
        <a href="<?php echo base_url(); ?><?php echo $video_url; ?>"
          style="display:block;width:425px;height:300px;"
          id="player" player-src="<?php echo base_url(); ?>/assets/plugin/flowplayer/flowplayer-3.2.18.swf">
        </a>
        <h4><?php echo $video['speaker']." | ".$video['date']; ?></h4>
      </div>
    </div>
  </div>
</div>

