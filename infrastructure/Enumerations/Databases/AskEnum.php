<?php


namespace Infrastructure\Enumerations\Databases;


use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class AskEnum
 * This Class defined For Ask Model
 * @package Infrastructure\Enumerations\Databases
 */
final class AskEnum
{
    /*---------------------------------
    | Ask Table Columns Name
    |----------------------------------
    */
    const TABLE_NAME = 'asks';

    const ID = 'id';
    const TITLE = 'title';
    const IMAGE = 'image';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    //---------------------------------


    /**
     * Put Data in Fillable coloumns Model
     *
     * @param string $title
     * @param string $imagePath
     * @return string[]
     */
    public static function putFillable(string $title, string $imagePath): array
    {
        return [
            self::TITLE => $title,
            self::IMAGE => $imagePath
        ];
    }

    /**
     * get the relation name
     *
     * Define the relations name in the $RELATIONS_NAME array
     * @return String
     */

    public static function getRelationName($name): string
    {

        $RELATIONS_NAME = [
            'CATEGORIES' => 'categories',
            'COMMENTS' => 'comments',
            'USER_lIKES' => 'user_likes'

        ];

        return Arr::pull($RELATIONS_NAME, Str::upper($name));

    }


}
