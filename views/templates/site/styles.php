<style>
    body{
        background: <?=$backgroundPath[0]['text_back_col']?>;
    }
    .sticky {
        background: <?=$backgroundPath[0]['text_back_col']?>;
    }
    
    a{
        color:<?=$backgroundPath[0]['cat_text_col']?>;
    }
    a:visited{
        color:<?=$backgroundPath[0]['cat_text_col']?>;
    }
    a:hover{
        color:<?=$backgroundPath[0]['cat_hov_col']?>;
    }

    #features {
    background: #090909 url(<?php echo $backgroundPath[0]['background_path'];?>) no-repeat center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    color: white;
    }

    #features .section-intro h1 {
    color: <?=$backgroundPath[0]['main_text_col']?>;
    }

    footer {
        
        color: <?=$backgroundPath[0]['footer_text_col']?>;
    }

    #features .section-intro h5 {
    color: rgba(<?=$color?>);
    }
    #features .section-intro p {
        color: rgba(<?=$color?>);
    }
    #go-top a {
        background: <?=$backgroundPath[0]['cat_name_col']?>;
        color:<?=$backgroundPath[0]['cat_text_col']?>;
    }
    
    .main-navigation li.highlight a {
        color: <?=$backgroundPath[0]['cat_name_col']?>;
    }
    .section-intro .with-bottom-line::after {
        background-color: <?=$backgroundPath[0]['cat_name_col']?>;
    }
    .features-list .h05 {
        color: <?=$backgroundPath[0]['cat_name_col']?>;
    }

    footer a, footer a:visited {
        color: <?=$backgroundPath[0]['cat_name_col']?>;
    }
</style>