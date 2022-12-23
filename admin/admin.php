<?php

/* OPTIONS PAGE(S)
--------------------------------------------------------------- */

// Add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Options du thème',
        'menu_title'    => 'Options du thème',
        'menu_slug'     => 'options',
        'capability'    => 'edit_pages',
        'redirect'      => true,
        'position'      => 2,
        'update_button' => 'Mettre à jour',
        'updated_message' => 'Les modifications ont été prises en compte',
        'icon_url'      => 'dashicons-info'
    ));
}

/* POST TYPE(S)
--------------------------------------------------------------- */

// Register post types
function register_custom_post_types()
{
    $post_types = ["cas-client", "changelog", "fonctionnalite", "landing-page"];

    foreach ($post_types as $post_type) {
        include_once(__DIR__ . '/post-types/' . $post_type . '.php');
    }
}
add_action('init', 'register_custom_post_types');

// Change post labels
function change_post_labels()
{
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = 'Dossiers';
    $labels->singular_name = 'Dossier';
    $labels->add_new = 'Ajouter';
    $labels->add_new_item = 'Ajouter un dossier';
    $labels->edit_item = 'Éditer le dossier';
    $labels->new_item = 'Nouveau dossier';
    $labels->view_item = 'Afficher le dossier';
    $labels->search_items = 'Search News';
    $labels->not_found = 'Aucun dossier trouvé.';
    $labels->not_found_in_trash = 'Aucun dossier trouvé dans la corbeille.';
    $labels->all_items = 'Tous les dossiers';
    $labels->menu_name = 'Dossiers';
    $labels->name_admin_bar = 'Dossiers';
}
add_action('init', 'change_post_labels');

// Add custom landing page taxonomy
function register_lp_labels_taxonomy()
{
    register_taxonomy(
        'lp-labels',
        array('landing-page'),
        array(
            'label' => 'Labels',
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
        )
    );
}
add_action('init', 'register_lp_labels_taxonomy');

/* BLOCK(S)
--------------------------------------------------------------- */

// Register blocks
function register_acf_blocks()
{
    $blocks = ["highlighting", "testimonials"];

    foreach ($blocks as $block) {
        register_block_type(__DIR__ . '/blocks/' . $block);
    }
}
add_action('init', 'register_acf_blocks');

// Register custom block category
function register_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'prezevolve',
                'title' => 'Prezevent',
            ),
        )
    );
}
add_filter('block_categories_all', 'register_block_category', 10, 2);
