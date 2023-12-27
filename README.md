Тестовое задание: Веб-программист (Wordpress)

Задание 2
Зарегистрировать свой тип записи, который будет иметь:
- публичный URL для использования с ЧПУ;
- возможность создавать свои таксономии;
- выводить в админке при создании нового типа записи только поля заголовка и
контента.

Для регистрации своего типа записи в WordPress необходимо использовать функцию register_post_type(). Вот пример кода для создания типа записи

        $taxonomy_labels = array(
            'name'              => _x( 'Htdev', 'taxonomy general name' ),
            'singular_name'     => _x( 'Htdev', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Htdev' ),
            'all_items'         => __( 'All Htdev' ),
            'parent_item'       => __( 'Parent Htdev' ),
            'parent_item_colon' => __( 'Parent Htdev:' ),
            'edit_item'         => __( 'Edit Htdev' ),
            'update_item'       => __( 'Update Htdev' ),
            'add_new_item'      => __( 'Add New Htdev' ),
            'new_item_name'     => __( 'New Htdev Name' ),
            'menu_name'         => __( 'Htdev' ),
        );
        $taxonomy_args   = array(
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $taxonomy_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'Htdev' ],
        );
        register_taxonomy( 'Htdev', [ 'post' ], $taxonomy_args );

        $post_args = array(
            'public' => true,
            'label'  => 'My Htdev',
            'rewrite' => array('slug' => 'my-htdevs'),
            'supports' => array('title', 'editor')
        );
        register_post_type('htdev_demo', $post_args);

В самом плагине я попытался реализовать нечто похожее на SOLID как это возможно в самом WP :-)


Задание 1
Расширить класс Walker_Nav_Menu для создания своей разметки навигационного меню,
вместо стандартного ul>li>a, вывести элементы меню в виде div>a (все пункты меню (<a>)
должны находиться в одном единственном контейнере (<div>), никаких остальных div, ul,
li, span и т.д. быть не должно).
Например, 

<div class="menu"><a href="#">Ссылка 1</a><a href="#">Ссылка 2</a></div>


Для создания своей разметки навигационного меню необходимо расширить класс Walker_Nav_Menu и переопределить методы start_lvl(), end_lvl() и start_el().

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<div class=\"sub-menu\">";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "$indent</div>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        if ( in_array( 'current-menu-item', $classes ) )
            $class_names .= ' active';

        if ( ! empty( $class_names ) )
            $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<a' . $class_names . ' href="' . esc_attr( $item->url ) . '">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</a>';
    }

}

После этого можно использовать новый класс в функции wp_nav_menu() которую втавляем в то места темы где надо вывести наше кастомное меню

wp_nav_menu( array(
    'theme_location' => 'primary',
    'menu_class' => 'menu',
    'walker' => new Custom_Walker_Nav_Menu(),
) );

ПРИМЕЧАНИЕ ПО ТЗ

хотел делать это в дочерней теме но тема по умолчанию в WP twentytwentyfour имеет новый особенный функционал который я еще не успел изучит так как пока небыло необходимости. а пилить отдельную тему нет времени. 
запилил то что успел