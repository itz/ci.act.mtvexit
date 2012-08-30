<meta property="og:title" content="<?php echo $title; ?> MTV EXIT Action Page &mdash; Join the Fight Against Human Trafficking"/>
<meta property="og:description" content="Tahukah kamu 88% dari perdangan orang di Indonesia terjadi pada wanita? Perdagangan orang terjadi saat ini disekitar kita. Yuk ikutan dan dukung gerakan #stophumantrafficking dengan http://facebook.com/mtvexitindonesia. Klik http://act.mtvexit.org untuk informasi lebih lanjut."/>
</head>
<body>
    <!--container start-->
    <div id="container" class="clearfix">
<div id="header" class="clearfix">
<a href="http://mtvexit.org"><img src="<?php echo base_url(); ?>assets/img/logo.png" width="270" height="203" alt=" " id="logo" /></a>
<ul id="donors">
	<li><a href="http://usaid.gov/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/usaid.png"></a></li>
  <li><a href="http://ausaid.gov.au/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/ausaid.png"></a></li>
  <li><a href="http://walkfree.org/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/walkfree.png"></a></li>
  <li><a href="http://www.aseansec.org/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/asean.png"></a></li>
</ul>
</div>

        <div id="main" class="clearfix">
            <div id="back">
                <a href="./">&laquo; Back</a>
            </div>
            <div id="main-content">
                <h2>List Of Tweet</h2>
                <div class="content share">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://act.mtvexit.org" data-text="Dukung #stophumantrafficking dan ikut aksinya bersama @MTVEXITID klik" data-size="medium" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>
                    &nbsp;&nbsp;
                    <div class="fb-like" data-href="<?php echo site_url('act1'); ?>" data-send="false" data-layout="button_count" data-width="75" data-show-faces="false"></div>
                </div>
                <div id="tweet-list">
                    <ul>
                        <?php
                        foreach ($data as $tweet) {
                            ?>
                            <li>
                                <p class="tweet"><?php echo $tweet->text; ?></p>
                                <p><a href="http://twitter.com/<?php echo $tweet->from_name; ?>"><?php echo $tweet->from_name; ?></a>, <a href="http://twitter.com/<?php echo $tweet->from_name; ?>/status/<?php echo $tweet->tweet_id; ?>"><?php echo $tweet->created_at; ?></a></p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>    
