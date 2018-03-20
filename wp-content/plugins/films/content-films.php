<?php
    /*Template Name: New Template
    */
    
    add_action( 'the_content', 'view_films' );
    
    function view_films() {
        get_header(); ?>
        <div id="primary">
            <div id="content" role="main">
            <?php
            $mypost = array( 'post_type' => 'films', );
            $loop = new WP_Query( $mypost );
            ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="card" style="width: 50rem;">
                            <?php the_post_thumbnail( array( 300, 600 ), array('class' => 'card-img-top') ); ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></strong></h5>
                                <p class="card-text">
                                    <strong>Cтоимость сеанса: </strong>
                                    <?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ); ?>
                                    <br />
                                
                                    <strong>Дата выхода в прокат: </strong>
                                    <?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?>
                                </p>
                                <a href="#" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                </article>
            <?php endwhile; ?>
            </div>
        </div>
        <?php wp_reset_query(); ?>
        <?php get_footer(); ?>
    }