<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use phpDocumentor\Reflection\Types\This;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Resolve the given type from the container.
     *
     * @param string $abstract
     * @param array $parameters
     * @return mixed
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function makeInstace($abstract, array $parameters = [])
    {
        return app()->make($abstract, $parameters);
    }


    /**
     * redirect to specified route with passing message as session
     * @param $routeName
     * @param $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function GoTo($routeName, $message)
    {

        return redirect()->route($routeName)->with(['message' => getSuccessCrudMessage($message)]);
    }
}
