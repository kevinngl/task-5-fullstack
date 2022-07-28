<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
class ArticlesController extends Controller
{
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
    public function create(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'title' => 'required',
             'content' => 'required',
             'image' => 'required',
             'category_id' => 'required',
             'user_id' => 'required',
         ]);
         $article = new Articles;

         if ($validator->fails()) {
             return response()->json(['error'=>$validator->errors()], 401);            
         }
         $article->title = $request->title;
         $article->content = $request->content;
         $article->image = $request->image;
         $article->category_id = $request->category_id;
         $article->user_id = $request->user_id;
        //  $article->user_id = Auth::user()->users->id;
         $article->save();

         return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil',
        ]);     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        $collection = Articles::where('id','=',$articles->id)->get();
        return $collection;
    }
    public function listAll(Articles $articles)
    {
        $collection = Articles::paginate();
        return $collection;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = $request->image;
        $article->category_id = $request->category_id;
        $article->user_id = $request->user_id;
       //  $article->user_id = Auth::user()->users->id;
        $article->update();

        return response()->json([
           'alert' => 'success',
           'message' => 'Berhasil',
       ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }
}
