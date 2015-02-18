
<?php


?>

<style>
    .wrapper{ 
        width: 50%;
        margin: 0px;
    }

    body{
        background-color: <?php echo $settings['bg_color']; ?>;
    }
    
    p{
        color:<?php echo $settings['paragraph_color']; ?>;
    }

    h1, h2{
        color:<?php echo $settings['heading_color']; ?>;
    }

    a:link {
        color:<?php echo $settings['link_color']; ?>;
    }

    a:visited {
        color:<?php echo $settings['link_color']; ?>;
    }

    a:hover {
        color:<?php echo $settings['link_over_color']; ?>;
    }

    a:active {
        color:<?php echo $settings['link_color']; ?>;
    }

    table{
        border-width: 1;
    }

</style>
