<?php

/**
 * https://codex.wordpress.org/it:Riferimento_funzioni/is_user_logged_in
 * https://developer.wordpress.org/reference/functions/wp_redirect/
 * https://codex.wordpress.org/Function_Reference/wp_login_url
 * https://codex.wordpress.org/it:Riferimento_funzioni/current_user_can
 * https://codex.wordpress.org/Function_Reference/wp_get_current_user
 */
function check_user_cap($cap, $login_redirect = false) {

    $user_has_cap = false;

    if (is_user_logged_in()) {
        // se l'utente corrente è loggato 
        
        if ( current_user_can($cap) ) {
            $user_has_cap = true;
        }
    } else {

        /*
         * nel caso non sia loggato potremmo reindizzarlo alla pagina di login
         * per poi fare un redirect sulla pagina corrente dopo il login
         */
        if ($login_redirect) {
            wp_redirect(wp_login_url(get_permalink()));
            exit;
        }
    }


    return $user_has_cap;
}


/*
 * Esempio: da utilizzare dentro una pagina di template
 * 
 * if ( !current_user_can("edit_post") && !check_user_role("skip_advertising") ) {
 *  get_template_parts("adv");
 * }
 * 
 * 
 * 
 * 
 */