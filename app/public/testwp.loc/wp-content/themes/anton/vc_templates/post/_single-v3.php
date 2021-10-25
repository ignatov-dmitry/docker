<?php
  $post_category = "";
  $categories = get_the_category();
  $separator = ' ';
  $output = '';
  if($categories){
    foreach($categories as $category) {
      $output .= '<a href="'. esc_url( get_category_link( $category->term_id ) ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'anton' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
    }
  $post_category = trim($output, $separator);
  }      
?>

  <article class="post">

    <div class="media">
      <figure class="entry-thumb pull-left"> 
          <a href="<?php the_permalink(); ?>" class="entry-image zoom-2">
               <?php the_post_thumbnail('thumbnail');?>
          </a>
      </figure>
      <div class="media-body">
        <div class="entry-meta-2">
            <span class="entry-date">
              <span><?php echo get_the_date(); ?></span>            
        </div>
        <h4 class="entry-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
      </div>
    </div>
  </article>