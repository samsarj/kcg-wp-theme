<?php
/**
 * Title: Page Title Area
 * Slug: kcg/page-title-area
 * Block Types: core/post-content
 * Post Types: page, post,
 */
?>

<!-- wp:cover {"dimRatio":80,"overlayColor":"secondary","isUserOverlayColor":true,"minHeight":50,"minHeightUnit":"vh","style":{"elements":{"link":{"color":{"text":"var:preset|color|light"}},"heading":{"color":{"text":"var:preset|color|light"}}},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}},"color":{"duotone":"unset"}},"textColor":"light"} -->
    <div class="wp-block-cover has-light-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60);min-height:50vh">
        <span aria-hidden="true" class="wp-block-cover__background has-secondary-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"layout":{"type":"constrained","contentSize":"600px"}} -->
                <div class="wp-block-group"><!-- wp:post-title {"textAlign":"center","level":1,"className":"text-shadow"} /-->
                    <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                    <p class="has-text-align-center has-medium-font-size">Page description here...</p>
                    <!-- /wp:paragraph -->
                </div>
            <!-- /wp:group -->
        </div>
    </div>
<!-- /wp:cover -->