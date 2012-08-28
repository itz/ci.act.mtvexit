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
    <h2>Counter</h2>
    <?php echo $data; ?>
    
    <h2 id="tweetFight">Tweet Fight</h2>
    Join Tweet Fight! Ikut yuk memerangi perdagangan orang melalui twitter. Tweet dukungan kamu dengan mention @MTVEXITID + #stophumantrafficking
    <br /><br />
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo site_url('#tweetFight'); ?>" data-text="Saya mendukung aksi #stophumantrafficking bersama @MTVEXITID. Yuk ikutan mendukung di http://act.mtvexit.org" data-size="large" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>

    <h2 id="infoGrafik">Infografik</h2>
    Pedagangan orang ada disekitar kita lho. Simak infographic seputar perdagangan orang di Indonesia. Jangan lupa share ke teman-teman terdekatmu via Facebook & Twitter ya
    <br /><br />
    <a href="<?php echo site_url('infografik'); ?>"><img src="<?php echo base_url() . 'assets/images/infographics.jpg'; ?>" /></a>

    <h2>The Fight Day</h2>
    Gabung bersama kami di Join The Fight Day. Hari Minggu 2 September 2012 jam 7-9 pagi.
    <br /><br />
    <a id="goToFBEvent" href="http://www.facebook.com/pages/MTV-EXIT-Action-Day-Stop-Human-Trafficking/377138362355335?ref=stream">MTV Exit Action Day</a>

    <h2 id="toolKit">Get The Toolkit</h2>
    Yuk mulai beraksi. Download MTV EXIT Toolkit dan mulai lakukan aksimu sendiri di komunitas, sekolah ataupun secara online.
    <br /><br />
    <a href="<?php echo site_url('youthleadertoolkit'); ?>">Get Youth Leader Toolkit Here</a>

    <h2 id="actVideo">Check The Video</h2>
    Cek video mengenai Safe Migration! Share 3 kunci utamanya kepada teman-temanmu via Facebook dan Twitter
    <br /><br />
    <iframe id="video" class="vimeo" src="http://player.vimeo.com/video/47516373?api=1&amp;player_id=video&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="635" height="468" frameborder="0" ></iframe>            
    <br /><br />
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo site_url('#actVideo'); ?>" data-text="Saya baru saja melihat video dan mendukung #stophumantrafficking. Ikutan aksi nyata @MTVEXITID yuk, klik http://act.mtvexit.org untuk ikutan" data-size="large" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>
    &nbsp;&nbsp;&nbsp;
    <div class="fb-like" data-href="<?php echo site_url('actvideo'); ?>" data-send="false" data-width="450" data-show-faces="false"></div>

    <h2>Walk Free</h2>
    Klik <a id="goToWalkFree" href="http://www.walkfree.org">www.walkfree.org</a> dan ikutan gerakan untuk mengakhiri perbudakan modern. 
    <br /><br />
    