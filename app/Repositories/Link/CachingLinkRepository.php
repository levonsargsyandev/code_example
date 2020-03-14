<?php

declare(strict_types=1);

namespace App\Repositories\Link;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingLinkRepository implements LinkRepositoryInterface
{

    /**
     * @var LinkRepository
     */
    private $repo;

    /**
     * @var Cache
     */
    private $cache;

    /**
     * CachingCampaignRepository constructor.
     * @param LinkRepository $repo
     * @param Cache $cache
     */
    public function __construct(LinkRepository $repo, Cache $cache)
    {
        $this->repo = $repo;
        $this->cache = $cache;
    }

    public function all($page)
    {
        $page = $page ? $page : 1;
        $key = 'products_list_' . $page;
        return $this->cache->tags('product')->remember($key, config('cache.expiry_date'), function() use ($page) {
            return $this->repo->all($page);
        });
    }

    public function create($data)
    {
        return $this->repo->create($data);
    }

    public function getById($id)
    {
        return $this->repo->getById($id);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    public function search($res)
    {
        return $this->repo->search($res);
    }
}
