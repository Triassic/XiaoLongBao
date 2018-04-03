<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="mvccc,church, mountain view, 山景城中國基督教會, 教會">

    <title>MVCCC</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- use below for release version -->
    <!-- link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" -->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/mvccc.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </head>

  <body>

  <div class="top">
    <div class="container">
      <ul class="loginbar pull-right">
        <?php
        if(Access::isLoggedIn())
        {
          $user = $this->session->userdata('firstname');
          $url = site_url() . '/auth/doLogout/ch';
          printf("<li><a href=\"%s\">%s 注銷</a></li>", $url, $user);
        }
        else
        {
          $url = site_url() . '/auth/loginForm';
          printf("<li><a href=\"%s\">登錄</a></li>", $url);
        }
        ?>
        <li class="devider"></li>
        <li><a href="http://www.intersect-mvccc.org">English</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="navbar navbar-inverse navbar-static-top mvccc-navbar" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand mvccc-brand" href="<?php echo site_url(); ?>/pages/index">山景城中國基督教會</a>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right mvccc-nav">
            <li><a href="<?php echo site_url(); ?>/pages/index">教會首頁</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">教會介紹<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url(); ?>/pages/church/introduction">教會簡介</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/church/faith-statement">信仰告白</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/pastors">教牧同工</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/church/schedule">聚會時間</a></li>
                <li><a href="#">事奉團隊</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/church/history">教會歷史</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/church/contact">聯係我們</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url(); ?>/worship">主日崇拜</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">教會生活<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url(); ?>/pages/fellowships">團契生活</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/activities/sundaySchoolAdults">成人主日學</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/activities/sundaySchoolKids">兒童主日學</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/awana/introduction">AWANA</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url(); ?>/events/eventList">日歷活動</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">資源中心<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url(); ?>/pages/resources/forms">申請表格</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/resources/donate">捐贈須知</a></li>
                <li><a href="<?php echo site_url(); ?>/pages/resources/links">重要鏈接</a></li>
                <li><a href="<?php echo site_url(); ?>/gallery/home">照片集錦</a></li>
                <li><a href="#">錄音錄像</a></li>
              </ul>
            </li>
            <?php
              if(Access::hasPrivilege(Access::PRI_READ_PRAYER))
              {
                printf('<li class="dropdown">');
                printf('<a href="#" class="dropdown-toggle" data-toggle="dropdown">同工服務<b class="caret"></b></a>');
                printf('<ul class="dropdown-menu">');
                printf('<li><a href="%s">代禱贊美</a></li>', site_url()."/prayer/prayerList");
                printf('<li><a href="%s">差傳事工</a></li>', site_url()."/pages/missions");
                printf('</ul>');
                printf('</li>');
              }
            ?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
