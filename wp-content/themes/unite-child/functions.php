<?php

function last_five_films( $atts ){
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'films',
        'posts_per_page' => 5,
    ) );
    if ( $query->have_posts() ) { ?>

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="media">
                <?php the_post_thumbnail( array( 100, 200 ),array('class'=>'mr-3') ); ?>
                <div class="media-body">
                    <h3 class="mt-0"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p>
                        <strong>Дата выхода: </strong>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?>                        
                    </p>
                    <p>
                        <strong>Cтоимость сеанса: </strong>
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ) . ' грн.'; ?>
                    </p>
                </div>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}
 
add_shortcode( 'last5films', 'last_five_films' );

?>