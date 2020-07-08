<?php

namespace App\GraphQL\Queries;
use App\Scenic;

class ScenicComplexQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Scenic::where('name','like','%'.$args['search'].'%')->get();
    }
}
