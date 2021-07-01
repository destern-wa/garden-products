<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function slugify(string $words, int $maxLength) {
        return substr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $words))), 0, $maxLength);
    }
}
