<?php
namespace App\Repositories\Grade;

use App\Models\Grade;
use App\Repositories\BaseRepository;
use App\Repositories\Grade\GradeRepositoryInterface;

class GradeRepository extends BaseRepository implements GradeRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Grade::class;
    }

    public function getAll()
    {
        return Grade::all();
    }

    public function find($id)
    {
        return Grade::find($id);
    }

    public function create($attribute = [])
    {
        return Grade::create($attribute);
    }

    public function update($id, $attribute = [])
    {
        return Grade::find($id)->update($attribute);
    }

    public function delete($id)
    {
        return Grade::find($id)->delete();
    }
}


