<?php

namespace App\Pipeline;

use Closure;
use Illuminate\Pipeline\Hub;

class FirstHub extends Hub
{
    /**
     * Отправляем объект по одному из имеющихся пайплайнов
     *
     * @param  mixed  $object
     * @param  string|null  $pipeline
     * @return mixed
     */
    public function pipe($object, $pipeline = null)
    {
        // Если пайплайн был создан, но не зарегистрирован, то мы вызовем метод для его создания
        if ($pipeline && ! isset($this->pipelines[$pipeline])) {
            $this->{'register' . ucfirst($pipeline)}();
        }

        return parent::pipe($object, $pipeline);
    }

    /**
     * Регистрация пайплайна для статьи
     *
     * @return void
     */
    protected function registerFirst()
    {
        $this->pipeline('first', function ($pipeline, $object) {
            return $pipeline->send($object)
                ->through([
                    FirstPipe::class,
                ])
                ->thenReturn();
        });
    }
    /**
     * Регистрация пайплайна для превью статьи
     *
     * @return void
     */
    protected function registerSecond()
    {
        $this->pipeline('second', function ($pipeline, $object) {
            return $pipeline->send($object)
                ->through([
                    SecondPipe::class
                ])
                ->thenReturn();
        });
    }
}
