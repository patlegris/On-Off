<?php

add_action('init', 'pl_create_gender_tax');

function pl_create_gender_tax()
{
    $labels = [
        'name'          => 'genre',
        'singular_name' => 'genre',
        'search_items'  => 'rechercher un genre',
        'all_items'     => 'tous les genres',
        'edit_item'     => 'éditer un genre',
        'update_item'   => 'mettre à jour un genre',
        'add_new_item'  => 'ajouter un genre',
        'menu_name'     => 'Genre'
    ];

    register_taxonomy('gender', ['post'], [
        'hierarchical' => true,
        'public'       => true, // afficher dans l'admin...
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
        'rewrite'      => ['slug' => 'genre']
    ]);
}