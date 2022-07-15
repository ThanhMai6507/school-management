<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    public function getModel()
    {
        return Student::class;
    }

    public function attachSubjects($studentId, $subjectIds)
    {
        $student = $this->find($studentId);
        $student->subjects()->sync($subjectIds);
    }

    public function detachSubjects($studentId, $subjectIds)
    {
        $student = $this->find($studentId);
        $student->subjects()->detach($subjectIds);
    }
}
