<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currency everyday at 1 AM';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $responseData = Http::acceptJson()->timeout(10)->withHeaders(['apikey' => env('CURRENCY_API_KEY','v0AggjA2dvJTMBTJ54LehTF9Yh47Vb7TQZFoDqVf') ])->get('https://api.currencyapi.com/v3/latest');
        foreach ($responseData['data'] as $response) {
            Currency::where('code' , $response['code'])->update(['rate' =>$response['value']]);
        }
        return 0;
    }
}
