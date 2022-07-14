<?php

namespace App\Http\Controllers;

use App\Repositories\Grade\GradeRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;
use App\Repositories\Classroom\ClassroomRepositoryInterface;

class ClassroomController extends Controller
{
    protected $classroomRepository;
    protected $gradeRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepo, GradeRepositoryInterface $gradeRepository)
    {
        $this->classroomRepository = $classroomRepo;
        $this->gradeRepository = $gradeRepository;
    }

    public function index()
    {
        $classrooms = $this->classroomRepository->getAll();

        return view('classrooms.index', [
           'classrooms' => $classrooms,
        ]);
    }

    public function create()
    {
        $grades = $this->gradeRepository->getAll();

        return view('classrooms.create', [
            'grades' => $grades
        ]);
    }

    public function store(ClassroomRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('name');
        $this->classroomRepository->create($data);

        return redirect()->route('classrooms.index'
        );
    }

    public function edit($id)
    {
        $classroom = $this->classroomRepository->find($id);
        $grades = $this->gradeRepository->getAll();

        return view('classrooms.edit', [
            'grades' => $grades,
            'classroom' => $classroom,
        ]);
    }

    public function update(ClassroomRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('name');
        $this->classroomRepository->update( $id, $data);

        return redirect()->route('classrooms.index');
    }

    public function delete(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->classroomRepository->delete($id);

        return redirect()->route('classrooms.index');
    }
}
