<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\DetailTransaction;
use App\Item;
use DB;
use Illuminate\Http\Request;

class DetailTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'id_item' => 'required',
            'amount' => 'required|min:0'
        ]);
        $transaction_data = Transaction::all();
        if($transaction_data->isEmpty()){
            $this_transaction = Transaction::create([
                'total' => '0',
                'change' => '0',
                'status' => '0',
            ]);
        }else{
            $this_transaction = Transaction::where('status','0')->first();
        }

        $item = Item::find($request->id_item);

        $check_item_added = DetailTransaction::where('id_transaction',$this_transaction->id)->where('id_item',$request->id_item)->first();
        if($check_item_added){
            $check_item_added->update([
                'amount' => $check_item_added->amount + $request->amount,
                'total' => $item->price *($check_item_added->amount + $request->amount),
            ]);
        }else{
            DetailTransaction::create([
                'id_transaction' => $this_transaction->id,
                'id_item' => $request->id_item,
                'amount' => $request->amount,
                'total' => $item->price * $request->amount
            ]);
        }


        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaction $detailTransaction)
    {
        dd($detailTransaction);
        $detailTransaction->delete();
        return response()->json('deleted');
    }

    public function getbasket($id)
    {
        // $data = DetailTransaction::where('id_transaction',$id)->get();

        $data = DB::table('detail_transactions')
            ->join('items', 'items.id', '=', 'detail_transactions.id_item')
            ->select('detail_transactions.*', 'items.*')
            ->get();
        // dd($data);
        return response()->json($data);
    }
}
