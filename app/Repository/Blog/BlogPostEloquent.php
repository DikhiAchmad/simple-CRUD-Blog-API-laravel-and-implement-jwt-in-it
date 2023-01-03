<?php

namespace App\Repository\Blog;

use App\Repository\Blog\BlogPostInterfaces;
use App\Models\BlogPosts;

class BlogPostEloquent implements BlogPostInterfaces
{
    public function getAllBlogPost()
    {
        return BlogPosts::all();
    }

    public function getBlogPostById($blogPostID)
    {
        return BlogPosts::find($blogPostID);
    }

    public function storeBlogPost(array $blogPostData)
    {
    }

    public function updateBlogPost($blogPostID, array $blogPostData)
    {
    }

    public function deleteBlogPost($blogPostID)
    {
    }
}