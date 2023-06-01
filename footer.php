<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Studio_Science
 */

 $proposal_file = get_field('proposal_file') ? get_field('proposal_file') : '#';

?>

<footer class="footer">
    <div class="container">
        <div class="footer__main">
            <div class="footer__main__link"><a href="<?php echo $proposal_file; ?>" download><span>Review the full proposal</span></a></div>
            <div class="footer__main__share"><?php echo do_shortcode('[addtoany]'); ?></div>
        </div>
        <div class="footer__legal">
            <div class="footer__legal__text">© <?php echo date("Y");?> Studio Science</div>
            <div class="footer__legal__link"><a href="<?php echo $proposal_file; ?>" download><span>Download Preview</span></a></div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<?php do_action('footer_scripts'); ?>

</body>
</html>
