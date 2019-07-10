<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostTemplate;
use Illuminate\Http\Request;

class PostTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $templates = PostTemplate::all();

        $viewData = [
            'templates' => $templates
        ];

        return view('post-templates.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post-templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $resultStatus = 500;

        try {

            $postTemplate = new PostTemplate();

            $templateName = $request->template_name ?? null;
            $templateJson = $request->template_json ?? null;

            if (empty($templateJson)) {
                throw new \InvalidArgumentException("Template json invalid");
            }

            if (empty($templateName)) {
                throw new \InvalidArgumentException("Name cannot be empty");
            }


            $postTemplate->template_json = json_encode($templateJson);
            $postTemplate->template_name = $templateName;
            $isSaved = $postTemplate->save();

            if (!$isSaved) {
                throw new \ErrorException("There was a problem in saving the template.");
            }

            $resultMessage = "Successfully saved the template";
            $resultStatus = 200;

        } catch (\Exception $exception) {
            $resultMessage = $exception->getMessage();
        }

        return response()->json([
            'result_message' => $resultMessage
        ], $resultStatus);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
