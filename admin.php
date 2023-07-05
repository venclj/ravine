<?php
function linked_url() {
    add_menu_page( 'linked_url', 'Vlastnosti', 'read', 'my_slug', '', 'dashicons-text', 1 );
}
function linkedurl_function() {
    global $menu;
    $menu[1][2] = get_edit_post_link( get_option( 'page_on_front' ) );
}

// credits: https://barebones.dev/articles/add-a-quick-link-to-edit-the-front-page-under-the-admin-pages-menu/
//        : https://stackoverflow.com/questions/39978561/how-to-add-custom-link-on-wordpress-admin-sidebar
?>