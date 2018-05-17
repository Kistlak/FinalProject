<?php
return array(
    /** set your paypal credential **/
    'client_id' =>'ARhWTNhd2Vi-KEXCMX0Gq8dlP9ERUUdUuP485SATLqIbGLvK-oE7q4B_e6t-fTPAN1Vf0BgdpXT9IUg9',
    'secret' => 'EJiyQbly_aBwRsU-79UBXtYdMw321v8teVeuRVPdEBvmLla1BdNOb52fJVHIVad71iQi52cjqHE8oJGH',
    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);