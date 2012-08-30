<meta property="og:title" content="<?php echo $title; ?> MTV EXIT Action Page &mdash; Join the Fight Against Human Trafficking"/>
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
                <iframe id="GDocsViewer" src="http://docs.google.com/viewer?url=<?php echo urlencode(base_url() . 'assets/pdf/youth-leader-toolkit.pdf'); ?>&amp;embedded=true" width="842" height="700" style="border: none;"></iframe>
                
                <div id="download-this">
                    <a id="dLTollkit" href="<?php echo base_url() . 'assets/pdf/youth-leader-toolkit.pdf'; ?>">Download To Your Computer</a>
                </div>

                <div class="content share" style="bottom:0">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://act.mtvexit.org" data-text="Saya baru saja mendownload toolkit #stophumantrafficking yuk dukung dan ikut aksinya bersama @MTVEXITID klik" data-size="medium" data-related="MTVEXITID" data-count="none" data-dnt="true">Tweet</a>
                    &nbsp;&nbsp;
                    <div class="fb-like" data-href="<?php echo site_url('act4'); ?>" data-send="false" data-layout="button_count" data-width="75" data-show-faces="false"></div>
                </div>


            </div>
