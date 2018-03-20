<?php
 /*Template Name: New Template
 */
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
        <?php the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="media">
                <?php the_post_thumbnail( array( 300, 600 ),array('class' => "mr-3")) ; ?>
               
                <div class="media-body">
                    <h2><strong><?php the_title(); ?></strong></h2>
                    <div class="container">
                    <div class="row">
                        <div class="col-3"><strong>Cтоимость сеанса: </strong></div>
                        <div class="col-9"><?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ) . ' грн.'; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-3"><strong>Дата выхода в прокат: </strong></div>
                        <div class="col-9"><?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?></div>
                    </div>                    
                    <div class="row">
                        <div class="col-3"><strong>Жанр: </strong></div>
                        <div class="col-9"><?php the_terms( $post->ID, 'films_genre' ,  ' ' );?></div>
                    </div>                    
                    <div class="row">
                        <div class="col-3"><strong>Страна: </strong></div>
                        <div class="col-9"><?php the_terms( $post->ID, 'films_country' ,  ' ' );?></div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="entry-content">
                <strong>Описание: </strong><br />
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>