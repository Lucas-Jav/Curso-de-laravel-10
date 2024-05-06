<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin/supports/index', compact('supports'));
    }

    public function create(Support $support)
    {
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';
        
        $support = $support->create($data);

        return redirect()->route('supports.index');
    }

    public function show(string | int $id)
    {
        // Support::find($id);
        // Support::where('id', $id)->first();
        // Support::where('id', '=', $id)->first();
        if (!$support = Support::find($id)) {
            return back();
        }

        return view('admin/supports/show', compact('support'));
    }

    public function edit(Support $support, string | int $id)
    {
        if (!$support = $support::where('id', $id)->first()) {
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(Request $request, Support $support, string | int $id)
    {
        if (!$support = $support::where('id', $id)->first()) {
            return back();
        }

        $support->update($request->only([
            'subject',
            'body'
        ]));

        /* 
            ou

            $support->subject = $request->subject;
            $support->body = $request->body;
            $support->save();
        */

        return redirect()->route('supports.index');
    }

    public function destroy(Support $support, string | int $id)
    {
        if (!$support = $support::find($id)) {
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}
