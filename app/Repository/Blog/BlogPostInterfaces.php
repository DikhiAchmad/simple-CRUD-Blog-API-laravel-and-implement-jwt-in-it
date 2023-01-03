<?php

namespace App\Repository\Blog;

interface BlogPostInterfaces
{
    public function getAllBlogPost();
    public function getBlogPostById($blogPostID);
    public function storeBlogPost(array $blogPostData);
    public function updateBlogPost($blogPostID, array $blogPostData);
    public function deleteBlogPost($blogPostID);
}