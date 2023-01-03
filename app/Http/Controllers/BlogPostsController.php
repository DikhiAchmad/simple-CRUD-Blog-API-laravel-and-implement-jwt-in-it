<?php

namespace App\Http\Controllers;

use App\Repository\Blog\BlogPostInterfaces;

class BlogPostsController extends Controller
{
    private BlogPostInterfaces $blogPost;

    public function __construct(BlogPostInterfaces $blogPost)
    {
        $this->blogPost = $blogPost;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->blogPost->getAllBlogPost()
        ]);
    }
}