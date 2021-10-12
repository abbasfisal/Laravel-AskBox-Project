<?php


namespace Infrastructure\Enumerations\Databases;


final class AskLikeEnum
{
    /*
     * This class Used For Define ---ask_like--- Table
     * which used in many to many relation
     * between the users and asks table
     */
    const TableName = 'ask_like';

    const USER_ID = 'user_id';
    const ASK_ID = 'ask_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
