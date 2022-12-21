<?php
$labels = [
    'name' => 'Cas client',
    'singular_name' => 'Cas client',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter un cas client',
    'edit_item' => 'Éditer le cas client',
    'new_item' => 'Nouveau cas client',
    'view_item' => 'Afficher le cas client',
    'search_items' => 'Rechercher un cas client',
    'not_found' =>  'Aucun cas client trouvé.',
    'all_items' => 'Tous les cas client',
    'not_found_in_trash' => 'Aucun cas client trouvé dans la corbeille.',
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
    'rewrite' => ['slug' => 'cas-clients', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-awards',
];

register_post_type('case-client', $args);
