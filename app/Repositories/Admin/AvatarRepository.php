<?php


namespace App\Repositories\Admin;


use App\Http\Requests\AvatarRequest;
use App\Models\Admin\Avatar;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Abstracts\Repositories\Base\BaseRepository;
use Infrastructure\Enumerations\Databases\AvatarEnum;
use Infrastructure\Interfaces\Repositories\Admin\AvatarRepositoryInterface;
use phpDocumentor\Reflection\Types\This;

class AvatarRepository
    extends BaseRepository
    implements AvatarRepositoryInterface
{

    public function __construct(Avatar $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = null)
    {
        return Avatar::paginate(config('appData.perPage'));
    }


    /**
     * @inheritDoc
     */
    public function store(AvatarRequest $avatarAttributes)
    {
        return $this->model::query()
            ->create([
                AvatarEnum::IMAGE => $avatarAttributes->get('filepath')
            ]);
    }

    /**
     * @inheritDoc
     */
    public function update(AvatarRequest $avatarAttributes, Avatar $avatar)
    {
        return

            $avatar->update([
                AvatarEnum::IMAGE => $avatarAttributes->get('filepath')
            ]);
    }


}
