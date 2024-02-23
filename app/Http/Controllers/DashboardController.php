<?php

namespace App\Http\Controllers;

use App\TimeEntry;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTimeEntriesRequest;
use App\Http\Requests\UpdateTimeEntriesRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * Display a listing of TimeEntry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time_entries = TimeEntry::all();
        
        return view('dashboard.index', compact('time_entries'));
    }

    /**
     * Show the form for editing TimeEntry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time_entry = TimeEntry::findOrFail($id);

        return view('dashboard.edit', compact('time_entry'));
    }

    /**
     * Update TimeEntry in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeEntriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeEntriesRequest $request, $id)
    {
        $time_entry = TimeEntry::findOrFail($id);
        $time_entry->update($request->all());

        return redirect()->route('dashboard.index');
    }

    /**
     * Display TimeEntry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $time_entry = TimeEntry::findOrFail($id);
        return view('dashboard.show', compact('time_entry'));
    }

    /**
     * Remove TimeEntry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time_entry = TimeEntry::findOrFail($id);
        $time_entry->delete();

        return redirect()->route('dashboard.index');
    }

    /**
     * Delete all selected TimeEntry at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = TimeEntry::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
