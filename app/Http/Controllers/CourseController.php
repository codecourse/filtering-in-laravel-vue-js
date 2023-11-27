<?php

namespace App\Http\Controllers;

use App\Course;
use App\Filters\Course\CourseFilters;
use App\Subject;
use Illuminate\Http\Request;

use App\Filters\Course\{
    AccessFilter,
    DifficultyFilter,
    StartedFilter,
    SubjectFilter,
    TypeFilter
};

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.vue');
    }
}
