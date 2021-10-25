<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <help@engotheme.com, info@engotheme.com>
 * @copyright  Copyright (C) 2015 engotheme.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.engotheme.com
 * @support  https://engotheme.com/
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('nice-style'); ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
        <?php endif; ?>
        <div class="post-container">
            <div class="blog-post-detail blog-post-grid">
                <figure class="entry-thumb">
                    <?php anton_fnc_post_thumbnail(); ?>                   
                </figure>
                <div class="information-post">
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                    <div class="entry-meta">
                        <span class="entry-date">
                            <span class="fa fa-clock-o"></span>
                            <span class="year">&nbsp;<?php echo get_the_date(); ?></span>
                        </span>                    
                    </div>
                    <div class="description">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
