<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Vimeo Froogaloop API Playground</title>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flexpaper_flash.js""></script>
        <script type="text/javascript" src="http://a.vimeocdn.com/js/froogaloop2.min.js""></script>

        <script type="text/javascript" >

            jQuery(document).ready(function() {
                Froogaloop('iframe.vimeo').addEvent('ready', ready);
                jQuery('iframe.vimeo').each(function(){
                    Froogaloop(this).addEvent('ready', ready);
                });
                function ready(playerID){
                    Froogaloop(playerID).addEvent('play', play);
                }
                function play(playerID){
                    console.log('sudah');
                }
            });
        </script>    
    </head>
    <body>
        <h2>Vimeo Player 1</h2>
        <!--
                <iframe id="video" class="vimeo" src="http://player.vimeo.com/video/47516373?api=1&amp;player_id=video&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="635" height="468" frameborder="0" ></iframe>            
        -->
        
        <iframe id="pdf" class="pdf" src="http://docs.google.com/gview?url=<?php echo urlencode(base_url().'assets/pdf/youth-leader-toolkit.pdf') ; ?>&embedded=true" style="width:718px; height:700px;" frameborder="0"></iframe>

        <!--
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/">
<head>
<title>Crowdsource the Agora logo</title> 
<meta property="og:title" content="Crowdsource the Agora logo - Logo One"/>
<meta property="og:site_name" content="Agora"/>
<meta http-equiv="refresh" content="0;url=http://agora.is/crowdsourcing-logo-selection/#logo1">
</head>
<body></body>
</html>
        -->
    </body>
</html>