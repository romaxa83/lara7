<?php

namespace App\Console\Commands\Elasticsearch;

class ElasticActions extends ElasticBase
{
    protected $signature = 'elastic:actions {type}';

    protected $description = 'Действия над индексами , аргументы (deleteAll)';

    public function handle()
    {
        switch ($this->argument('type')) {

            case 'delete':
                $this->deleteAll();
                break;

            default:
                $this->error($this->argument('type') . ' type does not exist, try one one thoses : deleteAll');
                break;
        }
    }

    // проверяем соединение с elasticsearch
    private function deleteAll()
    {
        if($this->client->ping()){

            $this->client->indices()->delete(['index' => '_all']);

            $this->info('All indices deleted');
            return;
        }
        $this->error('Connection fail');
        return;
    }
}
