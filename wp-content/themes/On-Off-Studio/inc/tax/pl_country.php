<?php

add_action('init', 'pl_create_country_tax');

function pl_create_country_tax()
{
    $labels = [
        'name'          => 'pays',
        'singular_name' => 'pays',
        'search_items'  => 'rechercher un pays',
        'all_items'     => 'tous les pays',
        'edit_item'     => 'éditer un pays',
        'update_item'   => 'mettre à jour un pays',
        'add_new_item'  => 'ajouter un pays',
        'menu_name'     => 'Pays'
    ];

    register_taxonomy('country', ['post', 'portfolio'], [
        'hierarchical' => false,
        'public'       => true, // afficher dans l'admin...
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
        'rewrite'      => ['slug' => 'pays']
    ]);
}