<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Classroom\ClassroomRepositoryInterface;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $classroomRepository;
    protected $subjectRepository;

    public function __construct(
        StudentRepositoryInterface $studentRepo,
        ClassroomRepositoryInterface $classroomRepository,
        SubjectRepositoryInterface $subjectRepository
    )
    {
        $this->studentRepository = $studentRepo;
        $this->classroomRepository = $classroomRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->getAll();

        return view('students.index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        $student = $this->studentRepository->getAll();
        $classrooms = $this->classroomRepository->getAll();

        return view('students.create', [
            'classrooms' => $classrooms,
            'student' => $student,
        ]);
    }

    public function store(StudentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only([
            'name',
            'classroom_id',
            'address',
            'gender',
        ]);
        $this->studentRepository->create($data);

        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = $this->studentRepository->find($id);
        $classrooms = $this->classroomRepository->getAll();

        return view('students.edit', [
            'student' => $student,
            'classrooms' => $classrooms,
        ]);
    }

    public function update(StudentRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only([
            'name',
            'classroom_id',
            'address',
            'gender',
        ]);
        $this->studentRepository->update( $id, $data);

        return redirect()->route('students.index');
    }

    public function delete(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->studentRepository->delete($id);

        return redirect()->route('students.index');
    }

    public function subjects($id)
    {
        $student = $this->studentRepository->find($id);
        $subjects = $student->subjects;
        return view('students.subjects.index', [
            'student' => $student,
            'subjects' => $subjects,
        ]);
    }

    public function deleteSubject($studentId, $subjectId)
    {
        $this->studentRepository->detachSubjects($studentId, $subjectId);
        return redirect()->route('students.subjects.index', $studentId);
    }

    public function attachSubject($studentId)
    {
        $subjects = $this->subjectRepository->getAll();
        return view('students.subjects.add', [
            'studentId' => $studentId,
            'subjects' => $subjects
        ]);
    }

    public function doAttachSubject(Request $request, $studentId)
    {
        $this->studentRepository->attachSubjects($studentId, $request->subjects);
        return redirect()->route('students.subjects.index', $studentId);
    }
}
