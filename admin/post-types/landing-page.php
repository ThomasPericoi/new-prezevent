<?php
$labels = [
    'name' => __('Landing pages', 'prezevolve'),
    'singular_name' => __('Landing page', 'prezevolve'),
    'add_new' => __('Ajouter', 'prezevolve'),
    'add_new_item' => __('Ajouter une landing page', 'prezevolve'),
    'edit_item' => __('Éditer une landing page', 'prezevolve'),
    'new_item' => __('Nouvelle landing page', 'prezevolve'),
    'view_item' => __('Afficher la landing page', 'prezevolve'),
    'search_items' => __('Rechercher une landing page', 'prezevolve'),
    'not_found' =>  __('Aucune landing page trouvée.', 'prezevolve'),
    'all_items' => __('Toutes les landing page', 'prezevolve'),
    'not_found_in_trash' => __('Aucune landing page trouvée dans la corbeille.', 'prezevolve'),
    'parent_item_colon' => ''
];

$args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'hierarchical' => true,
    'capability_type' => 'page',
    'supports' => [
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'page-attributes'
    ],
    'taxonomies' => [],
    'has_archive' => false,
    'rewrite' => ['slug' => 'lp', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-performance',
];

register_post_type('landing-page', $args);
