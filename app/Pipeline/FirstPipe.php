<?php

namespace App\Pipeline;

use Closure;

class FirstPipe
{
    /**
     * Переводит первый символ строки в верхний регистр
     *
     * @param string $string
     * @param Closure $next
     * @return mixed
     */
    public function handle($data, Closure $next)
    {
        $data['first_pipe'] = true;

        return $next($data);
    }
}
