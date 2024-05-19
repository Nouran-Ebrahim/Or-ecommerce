<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::latest();

            return Datatables::of($transactions)
                ->addColumn('action', function ($transaction) {
                    return '<a style="color: #000;" href="'.route('admin.transactions.show', $transaction).'"><i class="fas fa-eye"></i></a>
                            <a style="color: #000;" href="'.route('admin.transactions.edit', $transaction).'"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="formDelete" method="POST" action="'.route('admin.transactions.destroy', $transaction).'">
                                '.csrf_field().'
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                            </form>';
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'transactions\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        return view('Admin.transactions.show', compact('faq'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    }
}
