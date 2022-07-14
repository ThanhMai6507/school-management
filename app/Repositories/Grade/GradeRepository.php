<?php

namespace App\Repositories\Grade;

use App\Models\Grade;
use App\Repositories\BaseRepository;

class GradeRepository extends BaseRepository implements GradeRepositoryInterface
{
    public function getModel()
    {
        return Grade::class;
    }
}
