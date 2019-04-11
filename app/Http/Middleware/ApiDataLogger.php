<?php
namespace App\Http\Middleware;
use Storage;
use Closure;

class ApiDataLogger {
    private $startTime;
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $this->startTime = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $endTime = microtime(true);
        $fileName = 'api_datalogger_' . date('d-m-y') . '.json';
        $dataToLog = [
            'Time' => gmdate("F j, Y, g:i a"),
            'Type' => 'logs',
            'Method' => $request->method(),
            'Status' => $response->status(),
            'Duration' => number_format($endTime - LARAVEL_START, 3),
            'IP Address' => $request->ip(),
            'URL' => $request->fullUrl()
        ];

        $jsonData = json_encode($dataToLog);
        Storage::disk('api_logs')->append($fileName, $jsonData);
    }
}
