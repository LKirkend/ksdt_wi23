<?php

/**
 * @var SpinitronApiClient $client a client instance available in any including context
 */

if (!isset($client)) {
    include_once __DIR__ . '/SpinitronApiClient.php';

    // Put your station's API key into a file named "api-key.txt" one dir up from this file.
    // You can change the cache directory but it must be writable by the web server.
    $client = new SpinitronApiClient(
        SPINITRON_KEY,
        __DIR__ . '/../cache'
    );
}

//Note: caching issue still not fixed; load times are long bc of this