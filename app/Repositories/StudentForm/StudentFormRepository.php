<?php

namespace App\Repositories\StudentForm;

use App\Models\StudentForm;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentFormRepository extends Repository
{

    /**
     * StudentFormRepository constructor.
     * @param StudentForm $StudentForm
     */
    public function __construct(StudentForm $StudentForm)
    {
        parent::__construct($StudentForm);
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
        $data = $this->model->where('name', $name)->first();
        return $data;
    }
}
