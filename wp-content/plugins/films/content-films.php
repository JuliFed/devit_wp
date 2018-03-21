<?php
    /*Template Name: New Template
    */
        get_header(); ?>
        <div id="primary">
            <div id="content" role="main">
            <?php
                $temp = $wp_query; 
                $wp_query = null; 
                //$mypost = array( 'post_type' => 'films','showposts'=> 4 );
                //$loop = new WP_Query( $mypost );
                $paged = (isset($_REQUEST['pages'])) ? $_REQUEST['pages'] : 1;
                $wp_query = new WP_Query(); 
                $wp_query->query('showposts=4&post_type=films'.'&paged='.$paged); 
                $i=1;
            ?>
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
                 if($i == 1) { echo '<div class="row"><div class="col-md-6">'; }
                 else { echo '<div class="col-md-6">'; }
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="card" style="width: 50rem;">
                        <?php the_post_thumbnail(array( 300, 600 ), array('class' => 'card-img-top') ); ?>
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
                <?php 
                    if($i == 1) {
                        echo '</div>';
                        $i++;
                    } else {
                        echo '</div></div>';
                        $i = 1;
                    }
                ?>
            <?php endwhile; ?>
            <nav>
                <?php previous_posts_link('&laquo; Пред.') ?>
                <?php next_posts_link('След. &raquo;') ?>
            </nav>
            
        </div>
    </div>
    <?php //wp_reset_query(); ?>
    <?php get_footer(); ?>
