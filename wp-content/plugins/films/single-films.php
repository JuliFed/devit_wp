<?php
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
        <?php the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <!-- Display featured image in right-aligned floating div -->
                <div style="float: right; margin: 10px">
                    <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                </div>
                <!-- Display Title and Author Name -->
               <h2><strong><?php the_title(); ?></strong></h2><br />
                <strong>Cтоимость сеанса: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'film_price', true ) ); ?>
                <br />
                <!-- Display yellow stars based on rating -->
                <strong>Дата выхода в прокат: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'film_date', true ) ); ?>
            </header>
            <!-- Display movie review contents -->
            <hr>
            <div class="entry-content">
                <strong>Описание: </strong>
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>