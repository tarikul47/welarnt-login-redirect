<?php

/**
 * Plugin Name: Login Redirect
 * Plugin URI: http://onlytarikul.com
 * Author: Tarikul Islam
 * Author URI: http://onlytarikul.com
 * Description: This plugin does wonders
 * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: welearnt-login-redirect
 */

if (!defined('ABSPATH')) exit;

function welearnt_login_redirect($a, $b, $user)
{
    //check user cap from $user object 
    //var_dump($user);
    //die();

    if ($user && is_object($user) && is_a($user, 'WP_User')) {
       
        if ($user->has_cap('administrator')) {
            $url = admin_url();
        } elseif ($user->has_cap('subscriber')) {
            $url = home_url('/subscriber');
        }else {
            $url = home_url('/meal-contact-us');
        }
    }
    return $url;
}
add_filter('login_redirect', 'welearnt_login_redirect', 10, 3);
