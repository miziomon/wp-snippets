<?php

/*
 * esempio 232
 * Creazione di un nuovo utente e impostazione del ruolo
 * https://codex.wordpress.org/Function_Reference/wp_insert_user
 * https://codex.wordpress.org/Function_Reference/wp_generate_password
 * https://codex.wordpress.org/Class_Reference/WP_User
 */
function add_premium_user() {


    $userdata = array(
        'user_login' => 'mariorossi',
        'user_nicename' => 'Mario Rossi',
        'user_email' => 'mario@rossi.it',
        'user_pass' => wp_generate_password()
    );

    $user_id = wp_insert_user($userdata);

    // Set the user's role (and implicitly remove the previous role).
    $user = new \WP_User($user_id);
    $user->set_role("premium_user");
}
