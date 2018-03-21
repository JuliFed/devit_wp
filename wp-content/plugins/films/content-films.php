<?php
    /*Template Name: New Template
    */
        get_header(); ?>
        <div id="primary">
            <div id="content" role="main">
            <?php
            $current_page = $_GET['page'];
            $post_type = 'films'; 
            if ( empty($current_page) ) {
                $current_page = 1;
            }
            $args = array(
                'post_type'      => $post_type, 
                'posts_per_page' => 4,        
                'paged' =>  $current_page,      
            );
            $films = new WP_Query( $args ); 
            $i=1;
        ?>
            <?php while ( $films->have_posts() ) : $films->the_post();
                 if($i == 1) { echo '<div class="row"><div class="col-md-6">'; }
                 else { echo '<div class="col-md-6">'; }
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="card" style="width: 50rem;">
                        <?php the_post_thumbnail(array( 300, 600 ), array('class' => 'card-img-top') ); ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></strong></h5>
                            <p class="card-text">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/vallet.png" width="24"/>
                                <strong>Cтоимость сеанса: </strong>
                                <?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ); ?>
                            </p>
                            <p class="card-text">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/calendar.png" width="24"/>
                                <strong>Дата выхода: </strong>
                                <?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>
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
            <?php 
                if ( $films->max_num_pages > 1 ) : 
                    if ( $films->max_num_pages > $current_page && $current_page > 1 ) : ?> 
                        <a href="<?php prevlink($current_page) ?>">Предыдущая страница</a>
                        <a href="<?php nextlink($current_page) ?>">Следующая страница</a>
                    <?php elseif ( $current_page == 1 ) : ?> <a href="<?php nextlink($current_page) ?>">Следующая страница</a>
                    <?php elseif ( $current_page == $projects->max_num_pages ) : ?><a href="<?php prevlink($current_page) ?>">Предыдущая страница</a>
                <?php endif;
                endif; ?>

                
            </nav>
            
        </div>
    </div>
    <?php //wp_reset_query(); ?>
    <?php get_footer(); ?>

<?php
        // ссылка на следующую страницу
    function nextlink($current){
        echo '?page=' . ($current + 1);
    }
    // ссылка на предыдущую страницу
    function prevlink($current){
        echo '?page=' . ($current - 1);
    }
?>    
