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
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 150, 300 ),array('class'=>'mr-3') ); ?></a>
                <div class="media-body">
                    <h3 class="mt-0"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <table class="detail-film">
                        <tr>
                            <td>
                                <small>
                                    <strong>Жанр: </strong>
                                    <?php the_terms( $post->ID, 'films_genre' ,  ' ' );?>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <strong>Дата выхода: </strong>
                                    <?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?>                        
                                </small>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <small>
                                    <strong>Страна: </strong>
                                    <?php the_terms( $post->ID, 'films_country' ,  ' ' );?>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <strong>Cтоимость сеанса: </strong>
                                    <?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ) . ' грн.'; ?>
                                </small>
                            </td>
                        </tr>
                    </table>
                    <p>
                        <?php the_excerpt(); ?>
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