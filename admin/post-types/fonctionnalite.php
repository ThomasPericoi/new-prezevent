<?php
$labels = [
    'name' => __('Fonctionnalités', 'prezevolve'),
    'singular_name' => __('Fonctionnalité', 'prezevolve'),
    'add_new' => __('Ajouter', 'prezevolve'),
    'add_new_item' => __('Ajouter une fonctionnalité', 'prezevolve'),
    'edit_item' => __('Éditer une fonctionnalité', 'prezevolve'),
    'new_item' => __('Nouvelle fonctionnalité', 'prezevolve'),
    'view_item' => __('Afficher la fonctionnalité', 'prezevolve'),
    'search_items' => __('Rechercher une fonctionnalité', 'prezevolve'),
    'not_found' =>  __('Aucune fonctionnalité trouvée.', 'prezevolve'),
    'all_items' => __('Toutes les fonctionnalités', 'prezevolve'),
    'not_found_in_trash' => __('Aucune fonctionnalité trouvée dans la corbeille.', 'prezevolve'),
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
    'rewrite' => ['slug' => 'fonctionnalites', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-admin-generic',
];

register_post_type('fonctionnalite', $args);
