<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request\LinkRequest;
use App\Repositories\Link\LinkRepositoryInterface;
use App\Http\ResourceBundle\LinkResource;

class LinkController extends Controller
{

    private $repo;

    public function __construct(LinkRepositoryInterface $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return LinkResource::collation($this->repo->all($request->input('page'));
    }

    public function store(LinkRequest $request)
    {
        return new LinkResource($this->repo->create($request->all()));
    }

    public function show($id)
    {
        return new LinkResource($this->repo->getById($id));
    }

    public function destroy($id)
    {
        return new LinkResource($this->repo->delete($id));
    }

    public function search(Request $request)
    {
        return LinkResource::collation($this->repo->search($request->search));
    }
}
