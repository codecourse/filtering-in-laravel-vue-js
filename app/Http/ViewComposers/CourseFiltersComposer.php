<?php

namespace App\Http\ViewComposers;

use App\Subject;
use Illuminate\View\View;
use App\Filters\Course\CourseFilters;

class CourseFiltersComposer
{
    public function compose(View $view)
    {
        $view->with([
            'mappings' => CourseFilters::mappings(),
            'subjects' => Subject::get(),
        ]);
    }
}
