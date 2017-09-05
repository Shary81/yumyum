<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class cridio_Recaptcha_Logic
 */
class cridio_Recaptcha_Logic {
    /**
     * Checks if reCAPTCHA is enabled
     
     */
    public static function is_recaptcha_enabled() {
        $site_key = '6Le0BhYUAAAAAO3UgqT0Phz0uuz7iU4rbA70iF1e';
        $secret_key = '6Le0BhYUAAAAADcm9SdUEz7gV71OEur1hignF5S0';

        if ( ! empty( $site_key ) && ! empty( $secret_key ) ) {
            return true;
        }

        return false;
    }

    /**
     * Checks if reCAPTCHA is valid
      */
    public static function is_recaptcha_valid( $recaptcha_response ) {
        $secret_key = '6Le0BhYUAAAAADcm9SdUEz7gV71OEur1hignF5S0';
        $url = CRIDIO_RECAPTCHA_URL . '?secret=' . $secret_key . '&response=' . $recaptcha_response;

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );

        $output = curl_exec( $ch );
        $result = json_decode( $output, true );

        if ( array_key_exists( 'success', $result ) && 1 == $result['success'] ) {
            return true;
        }

        return false;
    }
}