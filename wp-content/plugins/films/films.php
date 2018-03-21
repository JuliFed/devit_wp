<?php
/*
Plugin Name: Films
Description: Declares a plugin that will create a custom post type displaying films.
Author: Fedorchenko Juli
Author-email: fedorchenkojuli@gmail.com
*/
    add_action( 'init', 'wptp_create_post_type' );
    function wptp_create_post_type() {
        $labels = array(
            'name' => __( 'Фильмы' ),
            'singular_name' => __( 'Фильмы' ),
            'add_new' => __( 'Новый фильм' ),
            'add_new_item' => __( 'Добавить новый фильм' ),
            'edit_item' => __( 'Редактировать фильм' ),
            'new_item' => __( 'Новый фильм' ),
            'view_item' => __( 'Просмотреть фильм' ),
            'search_items' => __( 'Искать фильмы' ),
            'not_found' =>  __( 'Фильмы не найдены' ),
            'not_found_in_trash' => __( 'Фильмы не найдены в корзине' ),
        );

        $args = array(
            'labels' => $labels,
            'has_archive' => true,
            'public' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
                ),
            'taxonomies' => array('films_genre','films_country','films_years','films_actors'), 
            'exclude_from_search' => false
        );
        register_post_type( 'films', $args );
    }

    add_action( 'init', 'wptp_register_taxonomy' );

    function wptp_register_taxonomy() {
        register_taxonomy( 'films_genre', 'films',
            array(
            'labels' => array(
                'name'              => 'Жанры',
                'singular_name'     => 'Жанры',
                'search_items'      => 'Поиск жанров',
                'all_items'         => 'Все жанры',
                'edit_item'         => 'Редактировать жанр',
                'update_item'       => 'Обновить жанр',
                'add_new_item'      => 'Добавить новый жанр',
                'new_item_name'     => 'Новое имя жанра',
                'menu_name'         => 'Жанры',
                ),
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'genre' ),
            'show_admin_column' => true
            )
        );

        register_taxonomy( 'films_country', 'films',
            array(
            'labels' => array(
                'name'              => 'Страны',
                'singular_name'     => 'Страны',
                'search_items'      => 'Поиск стран',
                'all_items'         => 'Все страны',
                'edit_item'         => 'Редактировать страну',
                'update_item'       => 'Обновить страну',
                'add_new_item'      => 'Добавить новую страну',
                'new_item_name'     => 'Новое имя страны',
                'menu_name'         => 'Страны',
                ),
            'hierarchical' => false,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'country' ),
            'show_admin_column' => true
            )
        );

        register_taxonomy( 'films_years', 'films',
            array(
            'labels' => array(
                'name'              => 'Годы',
                'singular_name'     => 'Годы',
                'search_items'      => 'Поиск по году',
                'all_items'         => 'Все года',
                'edit_item'         => 'Редактировать год',
                'update_item'       => 'Обновить год',
                'add_new_item'      => 'Добавить новый год',
                'new_item_name'     => 'Новое имя года',
                'menu_name'         => 'Года',
                ),
            'hierarchical' => false,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'years' ),
            'show_admin_column' => true
            )
        );
        
        register_taxonomy( 'films_actors', 'films',
            array(
            'labels' => array(
                'name'              => 'Актеры',
                'singular_name'     => 'Актеры',
                'search_items'      => 'Поиск по актерам',
                'all_items'         => 'Все актеры',
                'edit_item'         => 'Редактировать актера',
                'update_item'       => 'Обновить актера',
                'add_new_item'      => 'Добавить нового актера',
                'new_item_name'     => 'Новое имя актера',
                'menu_name'         => 'Актеры',
                ),
            'hierarchical' => false,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'actors' ),
            'show_admin_column' => true
            )
        );

    }

    add_action( 'admin_init', 'my_admin' );
    function my_admin() {
        add_meta_box( 'film_meta_box',
            'Детали фильма',
            'display_film_meta_box',
            'films', 'normal', 'high'
        );
    }

    function display_film_meta_box( $film ) {
        // Retrieve current name of the Director and Movie Rating based on review ID
        $film_price = esc_html( get_post_meta( $film->ID, 'film_price', true ) );
        $film_date = esc_html( get_post_meta( $film->ID, 'film_date', true ) );
?>        
    <table>
        <tr>
            <td style="width: 100%">Стоимость сеанса:</td>
            <td><input type="text" size="30" name="film_price" value="<?php echo $film_price; ?>" /></td>
            <td>грн.</td>
        </tr>
        <tr>
            <td style="width: 150px">Дата выхода фильма:</td>
            <td><input type="date" name="film_date" size="30" min="2018-01-01" value="<?php echo $film_date; ?>"></td>
        </tr>
    </table>
<?php
    }

    function true_taxonomy_filter() {
        global $typenow; // тип поста
        if( $typenow == 'films' ){ // для каких типов постов отображать
            $taxes = array('films_country', 'films_years', 'films_genre', 'films_actors'); // таксономии через запятую
            foreach ($taxes as $tax) {
                $current_tax = isset( $_GET[$tax] ) ? $_GET[$tax] : '';
                $tax_obj = get_taxonomy($tax);
                $tax_name = mb_strtolower($tax_obj->labels->name);
                // функция mb_strtolower переводит в нижний регистр
                // она может не работать на некоторых хостингах, если что, убирайте её отсюда
                $terms = get_terms($tax);
                if(count($terms) > 0) {
                    echo "<select name='$tax' id='$tax' class='postform'>";
                    echo "<option value=''>Все $tax_name</option>";
                    foreach ($terms as $term) {
                        echo '<option value='. $term->slug, $current_tax == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
                    }
                    echo "</select>";
                }
            }
        }
    }
     
    add_action( 'restrict_manage_posts', 'true_taxonomy_filter' );



    add_action( 'save_post', 'add_film_fields', 10, 2 );

    function add_film_fields( $film_id, $film ) {
        // Check post type for movie reviews
        if ( $film->post_type == 'films' ) {
            if ( isset( $_POST['film_price'] ) && $_POST['film_price'] != '' ) {
                update_post_meta( $film_id, 'film_price', $_POST['film_price'] );
            }
            if ( isset( $_POST['film_date'] ) && $_POST['film_date'] != '' ) {
                update_post_meta( $film_id, 'film_date', $_POST['film_date'] );
            }
        }
    }

    add_filter( 'template_include', 'include_template_function', 1 );
    function include_template_function( $template_path ) {
        if ( get_post_type() == 'films' ) {
            if ( is_single() ) {
                /*if ( $theme_file = locate_template( array ( 'single-films.php' ) ) ) {
                    $template_path = $theme_file;
                } else {
                    $template_path = plugin_dir_path( __FILE__ ) . '/single-films.php';
                }*/
            }
            else {
                if ( $theme_file = locate_template( array ( 'content-films.php' ) ) ) {
                    $template_path = $theme_file;
                } else {
                    $template_path = plugin_dir_path( __FILE__ ) . '/content-films.php';
                }
                
            }
        }
        return $template_path;
    }

   
?>