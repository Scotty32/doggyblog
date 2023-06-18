<?php declare(strict_stypes=1);

namespace App\Http\Controllers\Api\Dev;

use App\Http\Controllers\Controller;
use App\Services\Post\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    private PostService $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function likePost(int $id): Response
    {
        if($this->postService->likePost($id))
        {
            return response('une erreur', Response::HTTP_BAD_REQUEST);
        }

        return response('', Response::HTTP_CREATED);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }
}
