<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    public function getArticleList(): JsonResponse
    {
        return $this->successResponse();
    }

    public function getArticle(): JsonResponse
    {
        return $this->successResponse();
    }
}
