<?php

namespace App\Http\Middleware;

use App\Models\Request as ModelsRequest;
use App\Repository\Contract\IRequestStore;
use Closure;
use Illuminate\Http\Request;

class RequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private $requestRepository;

    public function __construct(IRequestStore $requestRepository)
    {
        $this->requestRepository = $requestRepository;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->requestRepository->store();
        return $next($request);
    }
}
