<?php

namespace Nuazsa\Nuacof;

class View
{
    public static function render(string $view, array $model = []) 
    {
        require __DIR__ . '/View/' . $view . '.php';
    }
}