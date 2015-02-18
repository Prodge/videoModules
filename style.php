
<?php


?>

<style>
    .wrapper{ 
        width: 50%;
        margin-left: auto;
        margin-right: auto;
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
        text-decoration: none;
    }
    a:visited {
        color:<?php echo $settings['link_color']; ?>;
        text-decoration: none;
    }
    a:hover {
        color:<?php echo $settings['link_over_color']; ?>;
        text-decoration: none;
    }
    a:active {
        color:<?php echo $settings['link_color']; ?>;
        text-decoration: none;
    }

    table{
        width: 90%;
    }
    th, td {
        border: 1px solid black;
    }
    th{
        text-align: left;
    }
    td {
        padding: 10px;
        vertical-align: top;
    }


</style>
