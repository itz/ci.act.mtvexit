<meta property="og:title" content="MTV EXIT Action Page &mdash; Join the Fight Against Human Trafficking"/>

<script type="text/javascript" src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<script type="text/javascript" >
    $(document).ready(function() {
        $('iframe.vimeo').each(function(){
            Froogaloop(this).addEvent('ready', ready);
        });
        function ready(playerID){
            Froogaloop(playerID).addEvent('play', play);
        }
        function play(playerID){            
            $.ajax({
                url: '<?php echo site_url('home/jobdone/2'); ?>'
            });
        }
        $('#goToFBEvent').click(function(){
            $.ajax({
                url: '<?php echo site_url('home/jobdone/4'); ?>'
            });
        });
        $('#goToWalkFree').click(function(){
            $.ajax({
                url: '<?php echo site_url('home/jobdone/6'); ?>'
            });
        });
    });
</script>    
</head>
<body>
    <!--container start-->
    <div id="container" class="clearfix">
        <div id="header" class="clearfix">
            <a href="http://mtvexit.org"><img src="<?php echo base_url(); ?>assets/img/logo.png" width="270" height="203" alt=" " id="logo" /></a>
            <ul id="donors">
                <li><a href="http://usaid.gov/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/usaid.png"></a></li>
                <li><a href="http://ausaid.gov.au/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/ausaid.png"></a></li>
                <li><a href="http://walkfree.org/id" target="_blank"><img src="<?php echo base_url(); ?>assets/img/walkfree.png"></a></li>
                <li><a href="http://www.aseansec.org/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/asean.png"></a></li>
            </ul>
        </div>
        <div id="main" class="clearfix">
            <div id="counter">
                <i></i>
                <b><?php echo $data; ?></b>
            </div>
            <div id="counter-text">
                <p>Aksi untuk melawan perdagangan orang</p>
            </div>

            <div id="main-content">
                <!--ACTION 1-->
                <div class="box" id="act1">
                    <b class="act-numb">Action #1</b>
                    <h2>Join Tweet Fight! Yuk ikut melawan perdagangan orang melalui twitter. <br /> Tweet dukungan kamu dengan mention <a href="http://twitter.com/mtvexitid" target="_blank"><strong class="yellow">@mtvexitid</strong></a> + <a href="http://act.mtvexit.org/index.php/act1"><strong class="yellow">#stophumantrafficking</strong></a> atau</h2>
                    <div class="banner-wrap">
                        <img src="<?php echo base_url(); ?>assets/img/banner/act1.png" width="842" height="139" alt=" " class="banner"/>
                        <div id="see-tweet">
                            <a href="<?php echo site_url('act1'); ?>">See Tweet</a>
                        </div>
                        <div id="tweet-btn" class="content">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://act.mtvexit.org" data-text="Saya mendukung aksi #stophumantrafficking bersama @MTVEXITID. Yuk ikutan mendukung di" data-size="large" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>
                        </div>
                    </div>
                </div>

                <!--ACTION 2-->
                <div class="box" id="act2">
                    <b class="act-numb">Action #2</b>
                    <h2>Pedagangan orang ada disekitar kita. Simak infographic seputar perdagangan orang di Indonesia. Jangan lupa share ke teman-teman terdekatmu via Facebook & Twitter.</h2>
                    <div class="banner-wrap">
                        <a href="<?php echo site_url('act2'); ?>"><img src="<?php echo base_url(); ?>assets/img/banner/act2.jpg" width="842" height="139" alt=" " class="banner"/></a>
                    </div>
                </div>

                <!--ACTION 3-->
                <div class="box" id="act3">
                    <b class="act-numb">Action #3</b>
                    <h2>Gabung bersama kami di Join The Fight Day. Hari Minggu 2 September 2012 jam 7-9 pagi.</h2>
                    <div class="banner-wrap">
                        <a id="goToFBEvent" href="http://www.facebook.com/pages/MTV-EXIT-Action-Day-Stop-Human-Trafficking/377138362355335?ref=stream" target="_blank"><img src="<?php echo base_url(); ?>assets/img/banner/act3.png" width="842" height="139" alt=" " class="banner"></a>

                        <div class="content share">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://act.mtvexit.org" data-text="Saya baru saja melihat video dan mendukung #stophumantrafficking. Ikutan aksi nyata @MTVEXITID yuk, ikutan di" data-size="medium" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>
                            &nbsp;&nbsp;
                            <div class="fb-like" data-href="<?php echo site_url('act3'); ?>" data-send="false" data-layout="button_count" data-width="75" data-show-faces="false"></div>
                        </div>
                    </div>
                </div>

                <!--ACTION 4-->
                <div class="box" id="act4">
                    <b class="act-numb">Action #4</b>
                    <h2>Yuk mulai beraksi. Download MTV EXIT Toolkit dan mulai lakukan aksimu sendiri di komunitas, sekolah ataupun secara online.</h2>
                    <div class="banner-wrap">
                        <a href="<?php echo site_url('act4'); ?>"><img src="<?php echo base_url(); ?>assets/img/banner/act4.png" width="842" height="139" alt=" " class="banner"/></a>
                    </div>
                </div>

                <!--ACTION 5-->
                <div class="box" id="act5">
                    <b class="act-numb">Action #5</b>
                    <h2>Cek video mengenai Safe Migration! Share 3 kunci utamanya kepada teman-temanmu via Facebook dan Twitter.</h2>
                    <div class="banner-wrap" id="vid">
                        <div id="the-vid">
                            <iframe id="video" class="vimeo" src="http://player.vimeo.com/video/48386246?api=1&amp;player_id=video&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=00adef" width="640" height="390" frameborder="0" ></iframe>  
                        </div>
                        <div class="content share">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://act.mtvexit.org" data-text="Saya baru saja melihat video dan mendukung #stophumantrafficking. Ikutan aksi nyata @MTVEXITID yuk, ikutan di" data-size="medium" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>
                            &nbsp;&nbsp;
                            <div class="fb-like" data-href="<?php echo site_url('act5'); ?>" data-send="false" data-layout="button_count" data-width="75" data-show-faces="false"></div>
                        </div>
                    </div>
                </div>

                <!--ACTION 6-->
                <div class="box" id="act6">
                    <b class="act-numb">Action #6</b>
                    <div class="banner-wrap">
                        <a id="goToWalkFree" href="http://walkfree.org/id" target="_blank"><img src="<?php echo base_url(); ?>assets/img/banner/act6.jpg" width="842" height="139" alt=" " class="banner"/></a>
                    </div>
                </div>

                <!--ACTION 7-->
                <div class="box">
                    <div class="banner-wrap">
                        <a href="http://mtvexit.org/contact/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/banner/thanks.jpg" width="842" height="139" alt=" " class="banner"/></a>
                    </div>
                </div>

            </div>
