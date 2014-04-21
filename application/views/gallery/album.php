<div class="row well">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url().'/gallery/home'?>">照片集錦</a></li>
            <li class="active"><a href="#"><?php echo $album['title'] ?></a></li>
        </ol>
        <div class="page-header">
            <h1><?php echo $album['title'];?></h1>
        </div>

        <?php # Only display the buttons when the loggin user has the update album privilege. ?>
        <?php if (Access::hasPrivilege(Access::PRI_UPDATE_ALBUM)) : ?>
            <div class="col-lg-12">
                <a href="<?php echo site_url().'/gallery/updateAlbum/' . $album['id']?>" class="btn btn-primary" role="button">更改照片</a>
                <a href="<?php echo site_url().'/gallery/updateAlbumInfo/' . $album['id']?>" class="btn btn-warning" role="button">更改信息</a>
                <a href="#" class="btn btn-danger" role="button">删除相册</a>
            </div>
            <hr class="mvccc-hr"/>
        <?php endif; ?>

        <br>
        <div id="container">
        <?php
            // Absolute path to the AWANA Album.
            $albumDir = FCPATH . 'gallery/' . $album['name'];

            if (file_exists($albumDir) && is_dir($albumDir)) :
                $files = scandir($albumDir);
                foreach ($files as $key => $value) :
                    $imgPath = base_url() . 'gallery/' . $album['name'] . '/' . $value;
                    $imgLocation = FCPATH . 'gallery/' . $album['name'] . '/' . $value;
                    if (is_dir($imgLocation)) :
                        continue;
                    endif;
                ?>
                    <?php # Display each image file. ?>
                    <div class="gallery-item">
                        <a class="fancybox" rel="group" href="<?php echo $imgPath;?>">
                            <img class="img-thumbnail" src="<?php echo $imgPath;?>" alt="" />
                        </a>
                    </div>
                <?php
                endforeach;
            endif;
            clearstatcache();
        ?>
        </div>
    </div>
</div>