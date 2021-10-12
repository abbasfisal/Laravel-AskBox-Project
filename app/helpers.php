<?php


if (!function_exists('getSuccessCrudMessage')) {
    /**
     * get message text from config/appData.crudSuccess
     */
    function getSuccessCrudMessage($type)
    {

        switch ($type) {
            case 'create':
                return config('appData.crudSuccess.create');
                break;
            case 'update':
                return config('appData.crudSuccess.update');
                break;
            case 'delete':
                return config('appData.crudSuccess.delete');
                break;
        }
    }
}

