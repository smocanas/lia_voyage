<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacebookPost
 *
 * @author smocanas
 */
class FacebookPost {

    /**
     * 
     * @param type $postName
     * @param type $postMessage
     * @param type $postLink
     * @param type $postCaption
     * @param type $postDescription
     * @return type
     */
    static public function get_app_token($appid, $appsecret) {
        $args = array(
            'grant_type' => 'client_credentials',
            'client_id' => $appid,
            'client_secret' => $appsecret
        );

        $ch = curl_init();
        $url = 'https://graph.facebook.com/oauth/access_token';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        $data = curl_exec($ch);

        return json_encode($data);
    }

}

?>
