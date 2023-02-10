<?php
$labels = [
    'name' => __('Changelogs', 'prezevolve'),
    'singular_name' => __('Changelog', 'prezevolve'),
    'add_new' => __('Ajouter', 'prezevolve'),
    'add_new_item' => __('Ajouter un changelog', 'prezevolve'),
    'edit_item' => __('Éditer un changelog', 'prezevolve'),
    'new_item' => __('Nouveau changelog', 'prezevolve'),
    'view_item' => __('Afficher le changelog', 'prezevolve'),
    'search_items' => __('Rechercher un changelog', 'prezevolve'),
    'not_found' =>  __('Aucun changelog trouvé.', 'prezevolve'),
    'all_items' => __('Tous les changelogs', 'prezevolve'),
    'not_found_in_trash' => __('Aucun changelog trouvé dans la corbeille.', 'prezevolve'),
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
    'rewrite' => ['slug' => 'changelog', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-hammer',
];

register_post_type('changelog', $args);
