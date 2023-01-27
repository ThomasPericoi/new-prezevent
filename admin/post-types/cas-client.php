<?php
$labels = [
    'name' => __('Cas client', 'prezevolve'),
    'singular_name' => __('Cas client', 'prezevolve'),
    'add_new' => __('Ajouter', 'prezevolve'),
    'add_new_item' => __('Ajouter un cas client', 'prezevolve'),
    'edit_item' => __('Éditer un cas client', 'prezevolve'),
    'new_item' => __('Nouveau cas client', 'prezevolve'),
    'view_item' => __('Afficher le cas client', 'prezevolve'),
    'search_items' => __('Rechercher un cas client', 'prezevolve'),
    'not_found' =>  __('Aucun cas client trouvé.', 'prezevolve'),
    'all_items' => __('Tous les cas client', 'prezevolve'),
    'not_found_in_trash' => __('Aucun cas client trouvé dans la corbeille.', 'prezevolve'),
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
