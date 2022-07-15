<?php

namespace App\Repositories\Subject;

use App\Models\Subject;
use App\Repositories\BaseRepository;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    public function getModel()
    {
        return Subject::class;
    }

    public function attachStudents($subjectId, $studentIds)
    {
        $subject = $this->find($subjectId);
        $subject->students()->sync($studentIds);
    }

    public function detachStudents($subjectId, $studentIds)
    {
        $subject = $this->find($subjectId);
        $subject->students()->detach($studentIds);
    }
}
