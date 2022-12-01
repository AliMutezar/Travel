<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckoutContoroller extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
        return view('pages.checkout', [
            'item'  =>  $item
        ]);
    }


    // Membuat data transaksi (input data ke table transactions)
    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id); 

        $transaction = Transaction::create([
            'travel_packages_id'    =>  $id,
            'user_id'               => Auth::user()->id,
            'additional_visa'       =>  0,
            'transaction_total'     =>  $travel_package->price,
            'transaction_status'     =>  'IN_CART'

        ]);


        // Tantangan: ambil semua data user, dari table User, jangan hardcode
        TransactionDetail::create([
            'transactions_id'   =>  $transaction->id,
            'username'          =>  Auth::user()->username,
            'nationality'       =>  'ID',
            'is_visa'           =>  false,
            'doe_passport'      =>  Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);

    }


    // Menghapus data di detail chekout
    public function remove(Request $request, $detail_id) 
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transactions_id);
        if ($item->is_visa == 1) 
        {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;
        $transaction->save(); //simpan data transactions terbaru

        $item->delete(); // setelah data transaksi terbaru disimpan, kemudian delete data TransactoinDetail
        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username'  =>  'required|string|exists:users,username',
            'is_visa'   =>  'required|boolean',
            'doe_passport'  =>  'required'
        ]);

        // masukin data ke transaction detail
        $data = $request->all();
        $data['transactions_id'] = $id;
        TransactionDetail::create($data);


        // ambil data transaksi beserta relasinya
        $transaction = Transaction::with(['travel_package'])->find($id);


        // update visa dan total transaksi
        if ($request->is_visa)
        {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        // redirect ke checkout dengan id transaksi
        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();

        return view('pages.success');
    }
}

