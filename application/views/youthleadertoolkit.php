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
                <h2>Mulai aksimu sekarang!</h2>
                <?php if (validation_errors()) : ?>
                    <ul class="ulwarning">
                        <?php echo validation_errors('<li>', '</li>'); ?>
                    </ul>
                <?php endif; ?>
                <form id="download" method="post" action="<?php echo current_url(); ?>">
                    <p>
                        <input type="text" class="text" name="tool_name" id="name" placeholder="Your name"/>
                    </p>
                    <p>
                        <input type="text" class="text" name="tool_email" id="email" placeholder="Your email"/>
                    </p>
                    <input type="submit" name="submit" value="Open Here" id="submit" />
                </form>
            </div>
