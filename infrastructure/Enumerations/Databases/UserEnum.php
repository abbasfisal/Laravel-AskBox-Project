<?php


namespace Infrastructure\Enumerations\Databases;


final class UserEnum
{
    const TABLE_NAME = 'users';

    const ID = 'id';
    const NAME = 'title';
    const IMAG = 'image';
    const EMAIL = 'email';
    const EMAIL_VERIFIED_AT = 'email_verified_at';
    const PASSWORD = 'password';
    const REMMEMBER_TOKEN = 'remember_token';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
