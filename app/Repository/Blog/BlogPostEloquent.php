<?php

namespace App\Repository\Blog;

use App\Repository\Blog\BlogPostInterfaces;
use App\Models\BlogPosts;
use Exception;
use Illuminate\Support\Facades\DB;

class BlogPostEloquent implements BlogPostInterfaces
{
    public function getAllBlogPost()
    {
        try {
            return BlogPosts::all();
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function getBlogPostById($blogPostID)
    {
        try {
            return BlogPosts::find($blogPostID);
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function storeBlogPost(array $blogPostData)
    {
        try {
            DB::beginTransaction();
            $storeData = BlogPosts::create(
                $blogPostData
            );
            DB::commit();
            return $storeData;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function updateBlogPost($blogPostID, array $newData)
    {
        try {
            DB::beginTransaction();
            $updatedData = BlogPosts::where('id', $blogPostID)->update($newData);
            DB::commit();
            return $updatedData;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function deleteBlogPost($blogPostID)
    {
        try {
            DB::beginTransaction();
            $deletedData = BlogPosts::destroy($blogPostID);
            DB::commit();
            return $deletedData;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }
}