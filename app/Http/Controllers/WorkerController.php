<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use Session;

class workerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the workers
        $workers = Worker::all();
        // return a view and pass in the above variable
        return view('workers.index')->withWorkers($workers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request, array(
            'name' => 'required|max:50',
            'company' => 'required|max:50',
            'email' => 'required|max:50|email',
            'phone_number' => 'required|max:25'
        ));

        //store in database
        $worker = new Worker;

        $worker->name = $request->name;
        $worker->company = $request->company;
        $worker->email = $request->email;
        $worker->phone_number = $request->phone_number;
      

        $worker->save();

        Session::flash('success', 'The new Worker was successfully saved!');

        //redirect 
        
        return redirect()->route('workers.show', $worker->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker = Worker::find($id);
        return view('workers.show')->withWorker($worker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);
        return view('workers.edit')->withWorker($worker);
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
        // validate the data
        $this->validate($request, array(
            'name' => 'required|max:50',
            'company' => 'required|max:50',
            'email' => 'required|max:50|email',
            'phone_number' => 'required|max:25'
        ));

        // save the data to the database
        $worker = Worker::find($id);

        $worker->name = $request->input('name');
        $worker->company = $request->input('company');
        $worker->email = $request->input('email');
        $worker->phone_number = $request->input('phone_number');

        $worker->save();

        // set a flash data with success message
        Session::flash('success', 'This Worker was successfully saved.');

        // redirect with flash data
        return redirect()->route('workers.show', $worker->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);

        $worker->delete();

        Session::flash('success', 'The worker was successfully deleted.');

        return redirect()->route('workers.index');
    }
}
