<?php

namespace App\Console\Commands;

use App\Disengage\Dto\ProductStoreDto;
use App\Disengage\Pattern\ProxyPattern;
use App\Disengage\Service\ProductService;
use App\Http\Controllers\ProductController;
use App\Repository\Eloquent\ProductStore;
use Illuminate\Console\Command;

class InsertProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Producto insertado luego de 2 minutos de espera';

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
        $productDto = new ProductStoreDto(
            random_int(0, 1),
            date('Y-m-d-H:i'),
            rand(100, 500),
            "Soy generado a través de una tarea programada"
        );
        //Uso de proxyPattern para comunicar controlador-servicio.
        $repository = new ProductStore();
        $proxyPattern = new ProxyPattern(new ProductService($repository));
        $proxyPattern->__invoke($productDto);
    }
}
