<meta property="og:title" content="<?php echo $title; ?>"/>
<meta property="og:site_name" content="<?php echo site_url(); ?>"/>
<meta property="og:image " content="<?php echo base_url(); ?>assets/images/toolkit_small.jpg"/>
<meta property="og:description" content="Tahukah kamu 88% dari perdangan orang di Indonesia terjadi pada wanita? Perdagangan orang terjadi saat ini disekitar kita. Yuk ikutan dan dukung gerakan #stophumantrafficking dengan http://facebook.com/mtvexitindonesia. Klik http://act.mtvexit.org untuk informasi lebih lanjut."/>

</head>
<body>
    <h2>Youth Leader Toolkit</h2>
    <?php if (validation_errors()) : ?>
        <div class="signupError">Error Found!
            <ul class="ulwarning">
                <?php echo validation_errors('<li>', '</li>'); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form id="GetToolkit" action="<?php echo site_url('youthleadertoolkit'); ?>" method="post">
        Name :<br />
        <input type="text" name="tool_name" /><br /><br />
        Email :<br />
        <input type="text" name="tool_email" /><br /><br />
        <input type="submit" name="submit" />
    </form>