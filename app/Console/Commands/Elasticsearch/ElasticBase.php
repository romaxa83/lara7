<?php

namespace App\Console\Commands\Elasticsearch;

use Elasticsearch\Client;
use Illuminate\Console\Command;

class ElasticBase extends Command
{
    protected $name = 'elastic';

    protected $url;

    protected Client $client;

    public function __construct(Client $client)
    {
        parent::__construct();

        $host = env('ELASTIC_HOST');
        $port = env('ELASTIC_PORT');

        $this->url = "{$host}:{$port}";
        $this->client = $client;
    }

    protected function request($path, $title = null)
    {
        $url = $this->url . $path;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        if($title){
            $this->info($title);
        }

        $result = $output;

        curl_close($ch);

        return $result;
    }
}
