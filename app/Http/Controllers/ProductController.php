<?php

namespace App\Http\Controllers;

use App\Disengage\Dto\ProductStoreDto;
use App\Disengage\Pattern\ProxyPattern;
use App\Disengage\Service\ProductService;
use App\Repository\Contract\IProductShow;
use App\Repository\Eloquent\ProductStore;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(IProductShow $allProducts)
    {
        //Contenedor
        $products = $allProducts->all();

        return view('home', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedRequest = $this->validateData($request);

        $productDto = new ProductStoreDto(
            $validatedRequest->state,
            $validatedRequest->nameProduct,
            $validatedRequest->price,
            $validatedRequest->description
        );
        //Uso de proxyPattern para comunicar controlador-servicio.
        $repository = new ProductStore();
        $proxyPattern = new ProxyPattern(new ProductService($repository));
        $proxyPattern->__invoke($productDto);

        return response()->json(['success']); 
        /* return redirect()->route('home'); */
    }

    private function validateData($request)
    {
        $this->validate($request, [
            'state' => ['required', 'boolean'],
            'nameProduct' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:100', 'max:500'],
            'description' => ['required', 'string', 'min:15']
        ]);

        return $request;
    }
}
