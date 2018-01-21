1) Place navwalker.php in your WordPress theme folder /wp-content/your-theme/

2) To use Bulma-navwalker add these lines to your functions.php

require_once('navwalker.php');
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'missionfit' ),
) );

3) Then add this initializer in your header (either index.php, header.php, etc...)
    wp_nav_menu( array(
        'theme_location'    => 'primary',
        'depth'             => 2,
        'container'         => false,
        // 'items_wrap'        => 'div',
        'menu_class'        => 'navbar-menu',
        'menu_id'           => 'primary-menu',
        'after'             => "</div>",
        'walker'            => new Navwalker())
    );

3) Congratulations you are now using Bulma!