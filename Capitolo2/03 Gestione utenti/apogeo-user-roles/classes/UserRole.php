<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userrole
 *
 * @author maurizio
 */
class UserRole {

    //put your code here

    public function install() {

        $capabilities = array(
            'read' => true,
            'skip_advertising' => true,
            'show_premium_content' => true
        );

        $role = add_role('premium_user', 'Utente premium', $capabilities);


        if (null == $role) {
            // uso error_log per tracciare il comportamento in caso di ruolo già presente
            error_log('Creazione ruolo fallita. Ruolo già presente');
            add_action('admin_notices', function() {
                echo 'Creazione ruolo fallita. Ruolo già presente';
            });
        }
    }

    public function deactivation() {
        
    }

}
