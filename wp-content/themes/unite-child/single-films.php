<?php
 /*Template Name: Single Film
 */
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
        <?php the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="row">
                <div class="col-4">
                    <?php the_post_thumbnail( array( 300, 600 ),array('class' => "mr-3", )); ?>
                </div>
                <div class="col-8">
                    <h2><strong><?php the_title(); ?></strong></h2>
                    <p><strong>Cтоимость сеанса: </strong></p>
                    <p><?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ) . ' грн.'; ?></p>
                    <p><strong>Дата выхода в прокат: </strong></p>
                    <p><?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?></p>
                    <p><strong>Жанр: </strong></p>
                    <p><?php the_terms( $post->ID, 'films_genre' ,  ' ' );?></p>
                    <p><strong>Страна: </strong></p>
                    <p><?php the_terms( $post->ID, 'films_country' ,  ' ' );?></p>
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