<?php
if (is_single()) {
    dynamic_sidebar( 'single_sidebar' );
} else{
    dynamic_sidebar( 'blog_sidebar' ); 
}
?>
