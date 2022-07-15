<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;
use App\Repositories\Subject\SubjectRepositoryInterface;
use App\Repositories\Student\StudentRepositoryInterface;

class SubjectController extends Controller
{
    protected $subjectRepository;
    protected $studentRepository;

    public function __construct(
        SubjectRepositoryInterface $subjectRepo,
        StudentRepositoryInterface $studentRepository
    )
    {
        $this->subjectRepository = $subjectRepo;
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository->getAll();

        return view('subjects.index', [
            'subjects' => $subjects,
        ]);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(SubjectRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('name');
        $this->subjectRepository->create($data);

        return redirect()->route('subjects.index');
    }

    public function edit($id)
    {
        $subject = $this->subjectRepository->find($id);
        return view('subjects.edit', [
            'subject' => $subject,
        ]);
    }

    public function update(SubjectRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('name');

        $this->subjectRepository->update( $id, $data);

        return redirect()->route('subjects.index');
    }

    public function delete(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->subjectRepository->delete($id);

        return redirect()->route('subjects.index');
    }

    public function students($id)
    {
        $subject = $this->subjectRepository->find($id);
        $students = $subject->students;
        return view('subjects.students.index', [
            'subject' => $subject,
            'students' => $students,
        ]);
    }

    public function deleteStudent($subjectId, $studentId)
    {
        $this->subjectRepository->detachStudents($subjectId, $studentId);
        return redirect()->route('subjects.students.index', $subjectId);
    }

    public function attachStudent($subjectId)
    {
        $students = $this->studentRepository->getAll();
        return view('subjects.students.add', [
            'subjectId' => $subjectId,
            'students' => $students
        ]);
    }

    public function doAttachStudent(Request $request, $subjectId)
    {
        $this->subjectRepository->attachStudents($subjectId, $request->students);
        return redirect()->route('subjects.students.index', $subjectId);
    }
}
