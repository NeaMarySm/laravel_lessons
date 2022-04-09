<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sources\CreateRequest;
use App\Http\Requests\sources\EditRequest;
use App\Models\Source;
use Illuminate\Http\Request;

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
                ->with('success', 'Данные успешно выгружены');
        }

        return back()
            ->with('error', 'Ошибка выгрузки');   
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
                ->with('success', 'Данные отредактированы');
        }
        return back()
            ->with('error', 'Ошибка редактирования');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
