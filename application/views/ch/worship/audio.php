<div class="container">
  <div class="well well-half">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-8">
        <h3><?php echo $video['title']; ?></h3>
        <a href="<?php echo base_url(); ?>/audios/<?php echo $video['audio_name']; ?>"
          style="display:block;width:425px;height:26px;"
          id="player" player-src="<?php echo base_url(); ?>/assets/plugin/flowplayer/flowplayer-3.2.18.swf">
        </a>

        <h4><?php echo $video['speaker']." | ".$video['date']; ?></h4>
      </div>
    </div>
  </div>
</div>