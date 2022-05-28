<?php

namespace App\Http\Controllers;

use App\c;
use App\Client;
use App\Commande;
use App\User;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Commande::orderBy('id', 'DESC')->get();
        view()->share('orders', $orders);

        return view('In.show', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
    }

    public function changeStatus(Request $request, $id)
    {
        $orders = User::find($id);
        User::where('id', $id)->update(['status' => $request->status]);
        view()->share('orders', $orders);

        return view('In.show', compact('$orders'));
    }

    public function customers()
    {
        $customers = Client::where('is_admin', 0)->get();

        return view('customers', compact('customers'));
    }

    /*
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    // public function destroy(c $c)
    // {
    // }
}
