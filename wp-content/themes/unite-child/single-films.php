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
                    <table class="table-responsive detail-film">
                        <tr>
                            <td><strong>Жанр: </strong></td>
                            <td><?php the_terms( $post->ID, 'films_genre' ,  ' ' );?></td>
                        </tr>
                        <tr>
                            <td><strong>Страна: </strong></td>
                            <td><?php the_terms( $post->ID, 'films_country' ,  ' ' );?></td>
                        </tr>
                        <tr>
                            <td><strong>Год: </strong></td>
                            <td><?php the_terms( $post->ID, 'films_years' ,  ' ' );?></td>
                        </tr>
                        <tr>
                            <td><strong>Актеры: </strong></td>
                            <td><?php the_terms( $post->ID, 'films_actors' ,  ' ' );?></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vallet.png" width="24"/>
                                <?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ) . ' грн.'; ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            
                            <td>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/calendar.png" width="24"/>
                                <?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?>
                            </td>
                            <td></td>
                        </tr>
                        
                    </table>
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