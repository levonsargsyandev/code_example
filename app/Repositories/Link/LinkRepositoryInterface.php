<?php

declare(strict_types=1);

namespace App\Repositories\Link;

interface LinkRepositoryInterface
{
    public function all($page);
    public function create($data);
    public function delete($id);
    public function search($res);
    public function getById($id);
}
