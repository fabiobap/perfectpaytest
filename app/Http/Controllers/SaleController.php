<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periodo = Carbon::parse($request->data) ?: Carbon::now();
        $customer = Customer::first();
        $customer_id = $request->customer_id ?: $customer->id;
        $clientes = Customer::all();

        $vendas = Sale::whereDate('updated_at', $periodo)->where('customer_id', '=', $customer_id)->get();
        $resultadoVendas = DB::select(
            "SELECT any_value(sales.quantity) as quantity, (sum(products.price)) as total, sales.status as status
            FROM perfectpay.products as products
            INNER JOIN perfectpay.sales as sales
            ON products.id = sales.product_id
            where sales.customer_id = ? and sales.updated_at = ? group by sales.status",
            [$customer_id, $periodo->toDateString()]
        );

        return view('sales.index', [
            'clientes' => $clientes,
            'vendas' => $vendas,
            'resultadoVendas' => $resultadoVendas
        ]);
    }

    private function calcularDesconto($preco, $desconto)
    {

        $desconto = ($desconto / 100);
        $valor = $preco * $desconto;
        return $preco - $valor;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.edit', ['sale' => $sale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $sale = Sale::findOrFail($id);
        $produto = Product::findOrFail($sale->product_id);

        $request->updated_at = Carbon::createFromFormat("d/m/Y", $request->updated_at);

        $produto->name = $request->name;
        $produto->price = $request->price;
        $produto->save();

        $sale->updated_at = $request->updated_at;
        $sale->save();

        $request->session()->flash('status', "Venda foi editada com sucesso!");
        return redirect()->route('vendas.edit', ['sale' => $sale]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
