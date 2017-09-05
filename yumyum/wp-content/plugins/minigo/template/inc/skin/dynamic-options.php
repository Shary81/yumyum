
/**
 * VARIOUS STYLING
 */


<?php if( $pt_minigo['switch-charts'] && $pt_minigo['chart-outline-color']['rgba'] ) { ?>
.minigo .chart::after,
.minigo .chart::before {
    border: 1px solid <?php echo $pt_minigo['chart-outline-color']['rgba'] ?>;
}
<?php } ?>

<?php if( $pt_minigo['loader-background-color']['rgba'] && ($pt_minigo['loader-background-color']['rgba'] != 'rgba(0,0,0,1)') ) { ?>
.minigo .loader {
    background: <?php echo $pt_minigo['loader-background-color']['rgba'] ?>;
}
<?php } ?>

<?php if( $pt_minigo['loader-animation-color']['rgba'] && ($pt_minigo['loader-animation-color']['rgba'] != 'rgba(255,255,255,1)') ) { ?>
.minigo .bubblingG span {
    background: <?php echo $pt_minigo['loader-animation-color']['rgba'] ?>;
}
<?php } ?>

/* Icon Menu Colors */

<?php
$x = 0;
foreach( $pt_minigo['icon_menu'] as $style ) {
        $x++;
    if ($style['color'] || $style['background'] || $style['border-color'] || $style['color-hover'] || $style['background-hover'] || $style['border-color-hover']) {
        ?>
        .minigo .nav-social a:nth-child(<?php echo $x; ?>),
        .minigo .icon-menu a:nth-child(<?php echo $x; ?>) {
        <?php if( $style['color'] ) { ?>
            color: <?php echo $style['color']; ?>;
        <?php } ?>
        <?php if( $style['background'] ) { ?>
            background: <?php echo $style['background']; ?>;
        <?php } ?>
        <?php if( $style['border-color'] ) { ?>
            border-color: <?php echo $style['border-color']; ?>;
        <?php } ?>
        }
        .minigo .nav-social a:hover:nth-child(<?php echo $x; ?>),
        .minigo .icon-menu a:hover:nth-child(<?php echo $x; ?>) {
        <?php if( $style['color-hover'] ) { ?>
            color: <?php echo $style['color-hover']; ?>;
        <?php } ?>
        <?php if( $style['background-hover'] ) { ?>
            background: <?php echo $style['background-hover']; ?>;
        <?php } ?>
        <?php if( $style['border-color-hover'] ) { ?>
            border-color: <?php echo $style['border-color-hover']; ?>;
        <?php } ?>
        }
    <?php
    }
}
?>