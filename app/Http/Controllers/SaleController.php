<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sale['sales'] = Sale::OrderBy('id', 'asc')->paginate(6);

        return view('index', $sale);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {

        $sale = Sale::emailSearch($request->email);

        $sumCommission = Sale::where('email', '=', $request->email)->sum('commission');

        return view('result', [ 
            'sales' => $sale,
            'email' => $request->email,
            'sumCommission' => $sumCommission
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->name==null || $request->email==null || $request->value==null){

            return redirect()->route('sale.index')->with('warning', 'Preencha todos os campos');

        } else {

            $number = $request->value;

            $formattedValue = str_replace('.', '', $number);
            $formattedValue = str_replace(',', '.', $formattedValue);

            $commission = ( 8.5 * $formattedValue ) / 100;
            $commission = number_format($commission, 2, '.', '');

            $sale = array(
                'name' => $request->name,
                'email' => $request->email,
                'value' => $formattedValue,
                'commission' => $commission,
            );

            Sale::create($sale);

            $formattedCommission = str_replace('.', ',', $commission); 

            return redirect()->route('sale.index')->with('message', 'Venda cadastrada com sucesso!
                                                                     - Nome: '.$request->name.' 
                                                                     - E-mail: '.$request->email.' 
                                                                     - Comissão: R$ '.$formattedCommission);
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
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
