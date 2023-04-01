<?php

/* OPTIONS PAGE(S)
--------------------------------------------------------------- */

// Add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Thème Prezevent', 'prezevolve'),
        'menu_title'    => __('Thème Prezevent', 'prezevolve'),
        'menu_slug'     => 'options',
        'capability'    => 'edit_pages',
        'redirect'      => true,
        'position'      => 2,
        'update_button' => __('Mettre à jour.', 'prezevolve'),
        'updated_message' => __('Les modifications ont été prises en compte', 'prezevolve'),
        'icon_url'      => 'dashicons-admin-settings'
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
    $labels->name = __('Dossiers', 'prezevolve');
    $labels->singular_name = __('Dossier', 'prezevolve');
    $labels->add_new = __('Ajouter', 'prezevolve');
    $labels->add_new_item = __('Ajouter un dossier', 'prezevolve');
    $labels->edit_item = __('Éditer le dossier', 'prezevolve');
    $labels->new_item = __('Nouveau dossier', 'prezevolve');
    $labels->view_item = __('Afficher le dossier', 'prezevolve');
    $labels->search_items = __('Chercher un dossier', 'prezevolve');
    $labels->not_found = __('Aucun dossier trouvé.', 'prezevolve');
    $labels->not_found_in_trash = __('Aucun dossier trouvé dans la corbeille.', 'prezevolve');
    $labels->all_items = __('Tous les dossiers', 'prezevolve');
    $labels->menu_name = __('Dossiers', 'prezevolve');
    $labels->name_admin_bar = __('Dossiers', 'prezevolve');
}
add_action('init', 'change_post_labels');

// Add custom landing page taxonomy
function register_lp_labels_taxonomy()
{
    register_taxonomy(
        'lp-labels',
        array('landing-page'),
        array(
            'label' => __('Labels', 'prezevolve'),
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
    $blocks = ["ads", "card-location", "content", "content-media", "faq", "features-grid", "highlighting", "logos", "media", "perks", "posts-grid", "shortcode", "summary", "tabs", "testimonials"];

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
