<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\RoleFilter;
use App\Support\Traits\Selectable;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends SpatieRole
{
    use HasFactory;
    use Filterable;
    use Selectable;

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = RoleFilter::class;
}
