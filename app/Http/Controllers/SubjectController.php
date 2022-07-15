<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;
use App\Repositories\Subject\SubjectRepositoryInterface;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepo)
    {
        $this->subjectRepository = $subjectRepo;
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

    public function students()
    {
        return redirect()->route('students.index');
    }
}
