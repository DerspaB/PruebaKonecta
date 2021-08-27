<?php

function main_menu(){
    return array(
        array(
            'title' => 'Crear Producto',
            'url' => base_url(),
        ),
        array(
            'title' => 'Ver Productos',
            'url' => base_url('/Products/show'),
        ),
    );
}