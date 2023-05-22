<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Studio_Science
 */

$error_message = get_field('error_message', 'options') ? get_field('error_message', 'options') : '404 Error';
$error_description = get_field('error_description', 'options') ? get_field('error_description', 'options') : 'Page Not Found';
$error_button = get_field('error_button', 'options');

get_header();
?>

<section class="error-404">
	<div class="container">
		<div class="error-404__content">
			<h1><?php echo $error_message; ?></h1>
			<h3><?php echo $error_description; ?></h3>
			<?php if($error_button) : ?>
				<a href="<?php echo $error_button['url']; ?>" class="btn"><?php echo $error_button['title']; ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>


<?php
get_footer();
