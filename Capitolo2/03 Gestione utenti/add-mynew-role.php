<?php

/**
 * funzione per la creazione di un nuovo ruolo
 * 
 * questa andrebbe chiamata una sola volta durante l'attivazione di un plugin "register_activation_hook"
 * https://codex.wordpress.org/Function_Reference/register_activation_hook
 * 
 * oppure durante inizializzazione del tema "fter_switch_theme"
 * https://codex.wordpress.org/Plugin_API/Action_Reference/after_switch_theme
 * 
 */
function add_mynew_role() {

    /* 
     * la funzione add_roles è wrapper della classe wp_roles 
     * https://developer.wordpress.org/reference/classes/wp_roles/
     */
    
    $wp_roles = add_role(
        'premium_user', 
        'Utente premium', 
            array( 'read' => true )
        );
    
    if (null == $wp_roles) {
        // uso error_log per tracciare il comportamento in caso di ruolo già presente
        error_log(  'Creazione ruolo fallita. Ruolo già presente' );
    }
    
    
    // restituisco l'oggetto nel caso sia necessario 
    return $wp_roles;
}

