<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\Repositories\Contracts\BaseRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @var BaseRepository
     */
    protected $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show($id)
    {
        return new Resource($this->repository->getOne($id));
    }

    public function index()
    {
        return Resource::collection($this->repository->getAll());
    }

    public function search(Request $request)
    {
        $filters = $request->input('filter');

        return Resource::collection($this->repository->filter($filters));
    }
}
