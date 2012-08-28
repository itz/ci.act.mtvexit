<meta property="og:title" content="<?php echo $title; ?>"/>
<meta property="og:site_name" content="<?php echo site_url(); ?>"/>
<meta property="og:image " content="<?php echo base_url(); ?>assets/images/infografik_small.jpg"/>
<meta property="og:description" content="Tahukah kamu 88% dari perdangan orang di Indonesia terjadi pada wanita? Perdagangan orang terjadi saat ini disekitar kita. Yuk ikutan dan dukung gerakan #stophumantrafficking dengan http://facebook.com/mtvexitindonesia. Klik http://act.mtvexit.org untuk informasi lebih lanjut."/>

<script type="text/javascript" >
    $(document).ready(function() {
        $('#dLTollkit').click(function(){
            $.ajax({
                url: '<?php echo site_url('home/jobdone/3'); ?>'
            });
        });
    });
</script>    

</head>
<body>
    <h2>Youth Leader Toolkit</h2>
    <iframe src="http://docs.google.com/viewer?url=<?php echo urlencode(base_url() . 'assets/pdf/youth-leader-toolkit.pdf'); ?>&amp;embedded=true" width="600" height="500" style="border: none;"></iframe>
    <br /><br />
    <a id="dLTollkit" href="<?php echo base_url() . 'assets/pdf/youth-leader-toolkit.pdf'; ?>">Download it Here!</a>
    <br /><br />
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo site_url('#toolKit'); ?>" data-text="Dukung #stophumantrafficking dan ikut aksinya bersama @MTVEXITID klik http://act.mtvexit.org" data-size="large" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>
    &nbsp;&nbsp;&nbsp;
    <div class="fb-like" data-href="<?php echo current_url(); ?>" data-send="false" data-width="450" data-show-faces="true"></div>
