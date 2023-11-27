<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Filters\Course\CourseFilters;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        return new CourseResource(
            Course::with(['subjects', 'users'])->latest()->filter($request)->paginate(5)
        );
    }

    public function filters()
    {
        return response()->json([
            'data' => CourseFilters::mappings(),
        ]);
    }
}
