<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Parkplan;
use App\Attraction;
use App\Http\Requests\StoreParkplanRequest;

class ParkplanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('parkplan');
    }

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
    public function store(StoreParkplanRequest $request)
    {
        $parkplan = new Parkplan($request->all());

        Auth::user()->parkplans()
                    ->save($parkplan);

        return redirect('/account');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parkplan = Auth::user()->parkplans()->find($id);

        if (!count($parkplan)) {
            return redirect('/account');
        }

        return view('account.parkplans.show', array('parkplan' => $parkplan));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parkplan::destroy($id);
        return redirect('/account');
    }

    public function activate($id)
    {
        session(['parkplan' => $id]);
        return redirect('/attractions');
    }

    public function add_attraction($id, $id2)
    {
        $parkplan = Auth::user()->parkplans()->find($id);
        $attractions = $parkplan->attractions();

        if ($attractions->find($id2)) {
            return redirect('/account/parkplans/'.$id);
        }
        else {
            $attractions->attach($id2);
        }

        return redirect('/account/parkplans/'.$id);
    }

    public function remove_attraction($id, $id2)
    {
        Auth::user()->parkplans()
                    ->find($id)
                    ->attractions()
                    ->detach($id2);

        return redirect('/account/parkplans/'.$id);
    }
}
