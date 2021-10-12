<?php


namespace App\Repositories\RelationTraits;


use App\Models\Admin\Ask;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait CategoryRelationTrait
{
    /*--------------------------------------------------------------------
     | Define Relation between Category Model and Other Models in This Class
     |--------------------------------------------------------------------
     */


    /**
     * Relation between Categories with Asks Table
     * many to many Relation
     * @return BelongsToMany
     */
    public function askboxes():BelongsToMany
    {
        return $this->belongsToMany(Ask::class);
    }

}
