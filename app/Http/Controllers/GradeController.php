<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Repositories\Grade\GradeRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    protected $gradeRepository;

    public function __construct(GradeRepositoryInterface $gradeRepo)
    {
        $this->gradeRepository = $gradeRepo;
    }

    public function index()
    {
        $grades = $this->gradeRepository->getAll();
        return view('grades.index', [
            'grades' => $grades,
        ]);
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(GradeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('name');
        $this->gradeRepository->create($data);

        return redirect()->route('grades.index');
    }

    public function edit($id)
    {
        $grade = $this->gradeRepository->find($id);
        return view('grades.edit', [
            'grade' => $grade,
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('name');

        $this->gradeRepository->update( $id, $data);

        return redirect()->route('grades.index');
    }

    public function delete(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->gradeRepository->delete($id);

        return redirect()->route('grades.index');
    }
}
