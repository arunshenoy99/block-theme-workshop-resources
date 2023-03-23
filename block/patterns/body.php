<?php

/**
 * Title: Body
 * Slug: blocktheme/body
 * Categories: blocktheme-pages
 * Block Types: core/post-content
 *
 * @package blocktheme
 * @since 1.0.0
 */

?>

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group">
    <!-- wp:group {"style":{"backgroundColor":"header-background","textColor":"header-foreground","spacing":{"blockGap":"0px","padding":{"top":"0px","bottom":"0px"}}},"className":"has-header-foreground-color has-header-background-background-color has-text-color has-background","layout":{"inherit":true,"type":"constrained"}} -->
    <div class="wp-block-group has-header-foreground-color has-header-background-background-color has-text-color has-background" style="padding-top:0px;padding-bottom:0px">
        <!-- wp:columns {"style":{"spacing":{"blockGap":"100px"}}} -->
        <div class="wp-block-columns">
            <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
                <!-- wp:query {"queryId":9,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                <div class="wp-block-query"><!-- wp:post-template -->
                    <!-- wp:post-title /-->

                    <!-- wp:post-date /-->

                    <!-- wp:post-excerpt /-->
                    <!-- /wp:post-template -->

                    <!-- wp:query-no-results -->
                    <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
                    <p></p>
                    <!-- /wp:paragraph -->
                    <!-- /wp:query-no-results -->
                </div>
                <!-- /wp:query -->

            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"bottom","width":"60%"} -->
            <div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:60%">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
                <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/clouds.jpg" alt="" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":"0px"}}} -->
    <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/forest.jpg","dimRatio":0,"minHeight":100,"minHeightUnit":"%","align":"center"} -->
            <div class="wp-block-cover aligncenter" style="min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/forest.jpg" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","layout":{"inherit":false,"contentSize":"70%"}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:spacer -->
            <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:heading {"level":3,"textColor":"primary","fontSize":"large"} -->
            <h3 class="has-primary-color has-text-color has-large-font-size">Take a walk in the woods.</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"lineHeight":"2"}}} -->
            <p style="line-height:2">Replenish your mind by talking a walk and connecting with nature </p>
            <!-- /wp:paragraph -->

            <!-- wp:spacer -->
            <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->