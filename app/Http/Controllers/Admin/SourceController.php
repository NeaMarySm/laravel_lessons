<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sources\CreateRequest;
use App\Http\Requests\sources\EditRequest;
use App\Models\Source;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sources.index',[
            'sources' => Source::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $source = Source::create($request->validated());

        if($source){
            return redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.sources.create.success'));
        }

        return back()
            ->with('error', __('messages.admin.sources.create.fail'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Source $source)
    {
        $data = $request->validated();

        $status = $source->fill($data)->save();

        if($status){
            return redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.sources.update.success'));
        }
        return back()
            ->with('error', __('messages.admin.sources.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Source $source
     * @return JsonResponse
     */
    public function destroy(Source $source):JsonResponse
    {
        try {
            $source->delete();
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error("Source wasn't deleted");
            return response()->json(['status' => 'error'], 400);
        }
    }
}
