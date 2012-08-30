<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $title; ?> MTV EXIT Action Page &mdash; Join the Fight Against Human Trafficking</title>
        <link href="<?php echo base_url(); ?>assets/css/bebas/stylesheet.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="<?php echo base_url(); ?>assets/css/titillium/stylesheet.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="<?php echo base_url(); ?>assets/css/css.css" type="text/css" rel="stylesheet" media="screen" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>

        <script type="text/javascript">
        
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-25730461-1']);
            _gaq.push(['_trackPageview']);
          
            _gaq.push(['l2._setAccount', 'UA-34389165-1']);
            _gaq.push(['l2._trackPageview']);
          
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        
        </script>

        <meta property="og:type" content="website"/>
        <meta property="og:url" content="<?php echo current_url(); ?>"/>
        <meta property="og:site_name" content="act.mtvexit.org"/>
        <meta property="og:image " content="<?php echo base_url(); ?>assets/images/mtvexitlogo.jpg"/>
        <meta property="fb:app_id" content="402057603189427"/>

        <?php echo $content; ?>

    <div class="footer">
        <span>MTV EXIT on social media</span>
        <ul>
            <li id="fb"><a href="http://www.facebook.com/mtvexitindonesia" target="_blank">Facebook</a></li>
            <li id="tw"><a href="https://twitter.com/#!/mtvexitid" target="_blank">Twitter</a></li>
        </ul>
    </div>
</div>
</div>
<!--container end-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=402057603189427";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript" charset="utf-8">
window.twttr = (function (d,s,id) {
    var t, js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
    js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
    return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
}(document, "script", "twitter-wjs"));

twttr.ready(function (twttr) {
    twttr.events.bind('tweet', function(event) {
        $.ajax({
            url: '<?php echo site_url('home/jobdone/5'); ?>'
        });
    });        
});
</script>
</body>
</html>
