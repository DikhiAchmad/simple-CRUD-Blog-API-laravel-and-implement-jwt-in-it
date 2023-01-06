<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Repository\Blog\BlogPostInterfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BlogPostsController extends Controller
{
    private BlogPostInterfaces $blogPost;

    public function __construct(BlogPostInterfaces $blogPost)
    {
        $this->blogPost = $blogPost;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->blogPost->getAllBlogPost()
        ]);
    }

    public function store(BlogPostRequest $request): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->blogPost->storeBlogPost($request->validated())
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->blogPost->getBlogPostById($orderId)
        ]);
    }

    public function update(BlogPostRequest $request): JsonResponse
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->blogPost->updateBlogPost($orderId, $request->validated())
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $this->blogPost->deleteBlogPost($orderId);

        return response()->json([
            'message' => "data sudah terhapus"
        ], Response::HTTP_NO_CONTENT);
    }
}