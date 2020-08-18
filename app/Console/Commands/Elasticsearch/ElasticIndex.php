<?php

namespace App\Console\Commands\Elasticsearch;

use App\Elasticsearch\SensorIndex;

class ElasticIndex extends ElasticBase
{
    protected $signature = 'elastic:index';

    protected $description = 'Создаем схему для индекса';

    public function handle()
    {
        if($this->client->ping()){

            $index = resolve(SensorIndex::class)->getSchema();

            $result = $this->client->indices()->create($index);
            dd($result);

            if($result['acknowledged']){
                $this->info('Index Created');
                return;
            }
            $this->warn('Something is wrong');
            return;
        }
        $this->error('Connection fail');
        return;
    }
}
