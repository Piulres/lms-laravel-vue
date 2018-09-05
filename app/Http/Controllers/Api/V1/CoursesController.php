<?php

namespace App\Http\Controllers\Api\V1;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course as CourseResource;
use App\Http\Requests\Admin\StoreCoursesRequest;
use App\Http\Requests\Admin\UpdateCoursesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;


class CoursesController extends Controller
{
    public function index()
    {
        

        return new CourseResource(Course::with(['instructor', 'lessons', 'categories'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('course_view')) {
            return abort(401);
        }

        $course = Course::with(['instructor', 'lessons', 'categories'])->findOrFail($id);

        return new CourseResource($course);
    }

    public function store(StoreCoursesRequest $request)
    {
        if (Gate::denies('course_create')) {
            return abort(401);
        }

        $course = Course::create($request->all());
        $course->instructor()->sync($request->input('instructor', []));
        $course->lessons()->sync($request->input('lessons', []));
        $course->categories()->sync($request->input('categories', []));
        if ($request->hasFile('featured_image')) {
            $course->addMedia($request->file('featured_image'))->toMediaCollection('featured_image');
        }

        return (new CourseResource($course))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCoursesRequest $request, $id)
    {
        if (Gate::denies('course_edit')) {
            return abort(401);
        }

        $course = Course::findOrFail($id);
        $course->update($request->all());
        $course->instructor()->sync($request->input('instructor', []));
        $course->lessons()->sync($request->input('lessons', []));
        $course->categories()->sync($request->input('categories', []));
        if (! $request->input('featured_image') && $course->getFirstMedia('featured_image')) {
            $course->getFirstMedia('featured_image')->delete();
        }
        if ($request->hasFile('featured_image')) {
            $course->addMedia($request->file('featured_image'))->toMediaCollection('featured_image');
        }

        return (new CourseResource($course))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('course_delete')) {
            return abort(401);
        }

        $course = Course::findOrFail($id);
        $course->delete();

        return response(null, 204);
    }
}
