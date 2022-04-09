<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\news\CreateRequest;
use App\Http\Requests\news\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'newsList' => News::with(['category'])->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::select('id', 'title')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $news = News::create($request->validated());

        if($news){
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()
            ->with('error', __('messages.admin.news.create.fail'));
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
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::select('id', 'title')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news)
    {
        $status = $news->fill($request->validated())->save();

        if($status){
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.update.success'));
        }
        return back()
            ->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return JsonResponse
     */
    public function destroy($news): JsonResponse
    {
        try {
            $news->delete();
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error("News wasn't deleted");
            return response()->json(['status' => 'error'], 400);
        }
    }
}
