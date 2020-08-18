<?php

namespace App\Console\Commands\Elasticsearch;

use Elasticsearch\Client;
use Illuminate\Console\Command;

class ElasticInfo extends ElasticBase
{
    protected $signature = 'elastic:info {type}';

    protected $description = 'Info for elastic, argument (check|schema|status|stats|health|nodes|index), for schema';

//    private Client $client;

//    public function __construct(Client $client)
//    {
//        parent::__construct();
//        $this->client = $client;
//    }

    public function handle()
    {
        switch ($this->argument('type')) {
            case 'check':
                $this->check();
                break;
            case 'schema':
                $this->schema();

                break;
            case 'status':
                $this->status();
                break;

            default:
                $this->error($this->argument('type') . ' type does not exist, try one one thoses : check, schema, status');
                break;
        }
    }

    // проверяем соединение с elasticsearch
    private function check()
    {
        if($this->client->ping()){
            $this->info('Connection success');
            return;
        }
        $this->error('Connection fail');
        return;
    }

    private function schema()
    {
        if($this->client->ping()){
            $result = $this->client->indices()->getMapping();
            dd($result);
        }
        $this->error('Connection fail');
        return;
    }

    private function status()
    {
        $result = $this->request("/_cat/indices?v");

        echo $result;
    }

    private function stats()
    {
        $result = $this->request('/_all/_stats?pretty=true');
        dd($result);
    }

}
