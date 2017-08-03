<?php

namespace SKT\Repositories\Backend\Access\Permission;

use SKT\Repositories\BaseRepository;
use SKT\Models\Access\Permission\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;
}
