<?php
$labels = [
    'name' => 'Landing pages',
    'singular_name' => 'Landing page',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une landing page',
    'edit_item' => 'Éditer la landing page',
    'new_item' => 'Nouvelle landing page',
    'view_item' => 'Afficher la landing page',
    'search_items' => 'Rechercher une landing page',
    'not_found' =>  'Aucune landing page.',
    'all_items' => 'Toutes les landing pages',
    'not_found_in_trash' => 'Aucune landing page trouvée dans la corbeille.',
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
