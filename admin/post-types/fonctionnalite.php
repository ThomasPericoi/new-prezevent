<?php
$labels = [
    'name' => 'Fonctionnalités',
    'singular_name' => 'Fonctionnalité',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une fonctionnalité',
    'edit_item' => 'Éditer la fonctionnalité',
    'new_item' => 'Nouvelle fonctionnalité',
    'view_item' => 'Afficher la page fonctionnalité',
    'search_items' => 'Rechercher une fonctionnalité',
    'not_found' =>  'Aucune fonctionnalité.',
    'all_items' => 'Toutes les fonctionnalités',
    'not_found_in_trash' => 'Aucune fonctionnalité trouvée dans la corbeille.',
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
