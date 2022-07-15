<?php

namespace App\Repositories\Student;

use App\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function attachSubjects($studentId, $subjectIds);
    public function detachSubjects($studentId, $subjectIds);
}
