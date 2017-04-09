</div>
<!-- <div class="well well-half"> -->


    <!-- Home Page Slides -->
    <div class="row">
        <div class="col-lg-12">
            <div id="carousel-generic" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="mvccc-slides" src="<?php echo base_url()?>/gallery/home/001.jpg" alt="First slide"/>
                        <div class="mvccc-slides-text">歡迎來到山景城中國基督教會</div>
                        <div class="carousel-caption">First Slide</div>
                    </div>
                    <div class="item">
                        <img class="mvccc-slides" src="<?php echo base_url()?>/gallery/home/002.jpg" alt="Second slide"/>
                        <div class="carousel-caption">Second Slide</div>
                    </div>
                    <div class="item">
                        <img class="mvccc-slides" src="<?php echo base_url()?>/gallery/home/003.jpg" alt="Third slide"/>
                        <div class="carousel-caption">Third Slide</div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#carousel-generic" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div><!-- carousel -->
            <!--
            <img class="mvccc-note" src="<?php echo base_url()?>/assets/img/notes.png"/>
        -->
        </div><!-- col -->
    </div><!-- row -->
    <br>

<div class="container">
    <!-- Worship Time -->
    <div class="row">
        <div class="col-lg-12">
            <hr class="mvccc-hr">
            <!--
            <img class="mvccc-arrow-banner" src="<?php echo base_url()?>/assets/img/arrow.png"/>
            -->
            <p class="text-center mvccc-h4">
                <span style="font-family:Kaiti TC">中文堂敬拜時間 禮拜日 上午 </span><span style="color: #254117">11:00</span>
            </p>
            <p class="text-center">175 East Dana Street, Mountain View, CA 94041 | Tel (650) 964-1591 </p>
            <hr class="mvccc-hr">
        </div>
    </div>
    <br>

    <!-- Block Items-->

    <div class="row mvccc-block-item">
        <br>
        <br>
        <div class="col-lg-4">
            <div class="">
                <!-- <img class="mvccc-resource-img" src="<?php echo base_url()?>/assets/img/calendar/Calendar-icon.png" alt="Recent Events"/>  -->
                <h3>日歷活動</h3>
                <p>歡迎參加山景城中國基督教會近期活動. 請關注我們的近期消息.</p>
                <p><a class="btn btn-default" href="#" role="button">詳細內容 &raquo;</a></p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="">
                <!-- <img class="mvccc-resource-img" src="<?php echo base_url()?>/assets/img/Awana.png" alt="awana"/> -->
                <h3>AWANA</h3>
                <p>幫助兒童學習聖經, 認識主耶穌. 提供各種課程和活動.</p><br>
                <p><a class="btn btn-default" href="#" role="button">詳細內容 &raquo;</a></p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="">
                <!-- <img class="mvccc-resource-img" src="<?php echo base_url()?>/assets/img/Awana.png" alt="awana"/> -->
                <h3>照片集錦</h3>
                <p>教會活動照片, 與我們一起分享喜樂!</p><br>
                <p><a class="btn btn-default" href="#" role="button">詳細內容 &raquo;</a></p>
            </div>
        </div>
    </div>


    <hr class="mvccc-hr">

    <div class="row mvccc-block-item">
        <br>
        <br>
        <div class="col-lg-2">
            <img class="img-circle mvccc-home-img pull-right" src="<?php echo base_url()?>/assets/img/pastorliu6.png" alt="Pastor Liu"/>
        </div>
        <div class="col-lg-3">
            <div class="word-block">
                <p>盼望教會能夠成為神在硅谷地區設立的金燈臺，使更多的同胞成為基督的追隨者；使教會成為基督恩典的管道，人人作耶穌的門徒、基督的使者！</p>
            </div>
        </div>
        <div class="col-lg-1"></div>
            <div class="col-lg-6">
              <a href="<?php echo base_url(); ?><?php echo $video_url; ?>"
                style="display: block; width: 425px; height: 300px;" id="player"
                player-src="<?php echo base_url(); ?>/assets/plugin/flowplayer/flowplayer-3.2.18.swf">
                </a>
              <h4>
                <?php echo $video['speaker']." | ".$video['date']; ?>
              </h4>
            </div>
    </div>
    <br>
    <br>

</div>
