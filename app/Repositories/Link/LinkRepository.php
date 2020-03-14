<?php

declare(strict_types=1);

namespace App\Repositories\Link;

use App\Models\Link;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class CampaignRepository
 * @package App\Repositories\Campaign
 */
class LinkRepository implements LinkRepositoryInterface
{
    public function all($page)
    {
        return Link::with('geos')->orderBy('id', 'DESC')->paginate(15);
    }

    public function getById($id)
    {
        return Link::find($id);
    }

    public function create($data)
    {
        return Link::create($data);
    }

    public function delete($id)
    {
        return Link::find($id)->forceDelete();
    }

    public function search($res)
    {
        return Link::where('name', $res)->orWhere('name', 'like', '%' . $res . '%')->orderBy('id', 'DESC')->paginate(15);
    }

}
