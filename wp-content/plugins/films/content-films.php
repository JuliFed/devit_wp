<?php
    /*Template Name: New Template
    */
   get_header(); ?>
   <div id="primary">
       <div id="content" role="main">
       <?php
       $mypost = array( 'post_type' => 'films', );
       $loop = new WP_Query( $mypost );
       ?>
       <?php while ( $loop->have_posts() ) : $loop->the_post();?>
           <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
               <header class="entry-header">
                    <div style="float: right; margin: 10px">
                        <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                    </div>
                    <h2><strong><?php the_title(); ?></strong></h2><br />
                    <strong>Cтоимость сеанса: </strong>
                    <?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ); ?>
                    <br />
                    
                    <strong>Дата выхода в прокат: </strong>
                    <?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?>
               </header>
               <div class="entry-content"><?php the_content(); ?></div>
           </article>
       <?php endwhile; ?>
       </div>
   </div>
   <?php wp_reset_query(); ?>
   <?php get_footer(); ?>
