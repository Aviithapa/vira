<?php

namespace App\Repositories\Course;

use App\Models\Course;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseRepository extends Repository
{

    /**
     * CourseRepository constructor.
     * @param Course $Course
     */
    public function __construct(Course $course)
    {
        parent::__construct($course);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, $type = null, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }

    /**
     * @param String $name
     * @return 
     */
    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
}
