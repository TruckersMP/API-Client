<?php

/**
 * Example Laravel controller with caching
 *
 * @see https://laravel.com/docs/5.4/cache
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Cache;
use Illuminate\Http\Request;
use TruckersMP\Helpers\APIClient;

class SearchController extends Controller
{

    public function find_user(Request $request)
    {
        $client = new APIClient();
        $needle = $request->input('needle');

        /**
         * Caching search for that needle for 10 minutes
         */
        $tmp = Cache::remember('users.player.' . (string)$needle, 10, function () use ($needle, $client) {
            return $client->player($needle);
        });

        return view('search', compact($tmp));
    }
}
