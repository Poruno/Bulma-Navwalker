## step one is to place navwalker.php in your WordPress theme folder /wp-content/your-theme/

## add these lines to your functions.php

```
require_once('navwalker.php');
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'missionfit' ),
) );
```

## then add this initializer in your header (either index.php, header.php, etc...)
```
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
```

## A proper navbar will look like this
```
<div>
    <nav class="navbar container" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://github.com/Poruno/Bulma-Navwalker">
                <img class="brand-image" src="localhost//examplesrc"/>
            </a>

            <button class="button navbar-burger" data-target="primary-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => false,
            // 'items_wrap'     => 'div',
            'menu_class'        => 'navbar-menu',
            'menu_id'           => 'primary-menu',
            'after'             => "</div>",
            'walker'            => new Navwalker())
        );
        ?>

    </nav>
</div>
```

# Congratulations you are now using Bulma!
