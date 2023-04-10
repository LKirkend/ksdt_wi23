<?php

class SpinitronApiClient
{
    protected $apiBaseUrl = 'https://spinitron.com/api';

    /**
     * @var array Cache expiration time per endpoint
     */
    protected static $cacheTimeout = [
        'personas' => 900,
        'shows' => 900,
        'playlists' => 300,
        'spins' => 30,
    ];

    private $apiKey;
    private $fileCachePath;

    public function __construct($apiKey, $fileCachePath)
    {
        $this->apiKey = $apiKey;
        // if (!is_dir($fileCachePath)) {
        //     throw new \Exception('$fileCachePath is not a directory');
        // }
        // if (!is_writable($fileCachePath)) {
        //     throw new \Exception('$fileCachePath is not writable');
        // }
        // $this->fileCachePath = $fileCachePath;

        //TEMPORARILY DISABLING MANUAL CACHING...
    }

    /**
     * Request resources from an endpoint using search parameters.
     *
     * @see https://spinitron.github.io/v2api for search parameters
     *
     * @param string $endpoint e.g. 'spins', 'shows' ...
     * @param array $params e.g. ['playlist_id' => 1234, 'page' => 2]
     * @return array Response with an array of resources of the endpoint's type plus metadata
     * @throws \Exception
     */
    public function search($endpoint, $params)
    {
        $url = '/' . $endpoint;
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        return json_decode($this->queryApi($url), true);
    }

    public function getPersonaFromShow($show){
        $personaId = explode('/', $show['_links']['personas'][0]['href'])[5];
        return $this->search('personas/' . $personaId,'');
    }
    /**
     * Request a resource from an endpoint using its ID
     *
     * @param string $endpoint e.g. 'shows', 'personas', ...
     * @param int $id e.g. 2344
     * @return array Response with one resource of the endpoint's type plus metadata
     * @throws \Exception
     */
    public function fetch($endpoint, $id)
    {
        $url = '/' . $endpoint . '/' . $id;

        return json_decode($this->queryApi($url), true);
    }

    /**
     * Query the API with the given URL, returning the response JSON document either from
     * the local file cache or from the API.
     *
     * @param string $endpoint e.g. 'spins', 'shows' ...
     * @param string $url
     * @return string JSON document
     * @throws \Exception
     */
    protected function queryCached($endpoint, $url)
    {
        $timeout = static::$cacheTimeout[$endpoint];
        $cacheFile = $this->fileCachePath . '/' . $timeout . $url;

        if (is_file($cacheFile) && filemtime($cacheFile) > time() - $timeout) {
            // Cache hit. Return the cache file content.
            return file_get_contents($cacheFile);
        }

        // Cache miss. Request resource from the API.
        $response = $this->queryApi($url);

        if (!file_exists(dirname($cacheFile))) {
            mkdir(dirname($cacheFile), 0755, true);
        }
        file_put_contents($cacheFile, $response);

        return $response;
    }

    /**
     * @param $url
     * @return string JSON document
     * @throws \Exception
     */
    protected function queryApi($url)
    {
        $context = stream_context_create([
            'http' => [
                'user_agent' => 'Mozilla/5.0 Spinitron v2 API demo client',
                'header' => 'Authorization: Bearer ' . $this->apiKey,
                'follow_location' => 1,
                'max_redirects' => 3,
                'timeout' => 1,
                'ignore_errors' => true,
            ],
        ]);
        $fullUrl = $this->apiBaseUrl . $url;

        $stream = fopen($fullUrl, 'rb', false, $context);
        if ($stream === false) {
            throw new Exception('Error opening stream for ' . $fullUrl);
        }

        $response = stream_get_contents($stream);
        if ($response === false) {
            throw new Exception('Error requesting ' . $fullUrl . ': ' . var_export(stream_get_meta_data($stream), true));
        }

        return $response;
    }
}
