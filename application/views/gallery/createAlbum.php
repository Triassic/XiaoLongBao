<div class="container">
    <div class="row well">
        <br><br>
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url() . '/gallery/create_album/' . $lang ?>">
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $this->lang->line('album_date')?></label>
                    <div class="col-lg-10">
                        <div class="input-group date" id="dp3" data-date="<?php echo $today?>" data-date-format="mm-dd-yyyy">
                            <input class="form-control" type="text" readonly="" value="<?php echo $today?>" name="date">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $this->lang->line('album_title')?></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="title" placeholder="<?php echo $this->lang->line('album_title')?>" value="<?php echo set_value('title'); ?>">
                        <?php echo form_error('title'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $this->lang->line('album_desc')?></label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="10" name="content"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-info"><?php echo $this->lang->line('button_add')?></button>
                        <?php
                            $url = site_url() . '/gallery/home/' . $lang;
                            printf('<a href="%s" class="btn btn-default" role="button">%s</a>', $url, $this->lang->line('button_cancel'));
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>