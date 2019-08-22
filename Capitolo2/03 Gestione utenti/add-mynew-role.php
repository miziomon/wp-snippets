<?php

/**
 * esempio 231
 * Creazione di un nuovo ruolo
 * https://codex.wordpress.org/Function_Reference/add_role
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
    
    $role = add_role(
        'premium_user', 
        'Utente premium', 
            array( 'read' => true ) 
        );
    
    if (null == $role) {
        // uso error_log per tracciare il comportamento in caso di ruolo già presente
        error_log(  'Creazione ruolo fallita. Ruolo già presente' );
    } else {

        
        // Se il ruolo è stato creato correttamente aggiungo le specifiche 
        $role->add_cap( 'skip_advertising' ); 
        $role->add_cap( 'show_premium_content' ); 
        
    }

    // restituisco l'oggetto nel caso sia necessario 
    return $wp_roles;
}


/*
 * esempio di registrazione ruolo all'attavazione di un plugin
 * 
 * register_activation_hook( __FILE__, 'add_mynew_role' );
 */