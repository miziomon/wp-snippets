<?php     
        
/**
 * Funzione per verificare il ruolo di un utente.
 * Il secondo parametro è opzionale. 
 * 
 * @param type $rolename
 * @param type $user_id
 * @return boolean
 */        
function has_role( $rolename , $user_id = 0 ) {
        
        $user_has_role = false;
        
        // se $user_id è zero prendo utente corrente
        $user = ( $user_id ) ? get_user_by( 'id', $user_id ) : wp_get_current_user();
	
        if ($rolename == $user->roles) {
            $user_has_role = true;
        }
        
        // metto a disposizione un filtro nel caso 
        // sia necessario cambiare le logiche di verifica del ruolo
        $user_has_role = apply_filters( "has_role", $user_has_role , $user );
        
        return $user_has_role;
        
}        


