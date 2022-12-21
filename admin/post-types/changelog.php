<?php
$labels = [
    'name' => 'Changelogs',
    'singular_name' => 'Changelog',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter un changelog',
    'edit_item' => 'Éditer le changelog',
    'new_item' => 'Nouveau changelog',
    'view_item' => 'Afficher le changelog',
    'search_items' => 'Rechercher un changelog',
    'not_found' =>  'Aucun changelog trouvé.',
    'not_found_in_trash' => 'Aucun changelog trouvé dans la corbeille.',
    'all_items' => 'Tous les changelogs',
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
    'rewrite' => ['slug' => 'changelog', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-hammer',
];

register_post_type('changelog', $args);
