<?php

namespace App\Repositories\Subject;

use App\Repositories\RepositoryInterface;

interface SubjectRepositoryInterface extends RepositoryInterface
{
    public function attachStudents($subjectId, $studentIds);
    public function detachStudents($subjectId, $studentIds);
}
