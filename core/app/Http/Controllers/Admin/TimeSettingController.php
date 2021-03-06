<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TimeSetting;
use Illuminate\Http\Request;

class TimeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Manage Time Settings";
        $team = TimeSetting::all();
        return view('admin.time_setting.index', compact('page_title', 'team'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'time' => 'required|numeric|min:0'
        ]);

        TimeSetting::create($request->all());
        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeSetting  $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSetting $timeSetting, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'time' => 'required|numeric|min:0'
        ]);

        TimeSetting::whereId($id)->update($request->except(['_method', '_token']));

        $notify[] = ['success', 'Update Successfully'];
        return back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeSetting  $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSetting $timeSetting ,$id)
    {
        TimeSetting::whereId($id)->delete();
        $notify[] = ['success', 'Delete Successfully'];
        return back()->withNotify($notify);
    }
}
