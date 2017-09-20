<?php
if ( ! function_exists('uuid_make'))
{
    /**
     * Creates a UUID
     *
     * @return string UUID
     */
    function uuid_make()
    {
        return strtolower(trim(shell_exec('/usr/bin/uuidgen')));
    }
}
if ( ! function_exists('is_uuid'))
{
    /**
     * Creates a UUID
     *
     * @return string UUID
     */
    function is_uuid($uuid)
    {
        return (preg_match("/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}/", $uuid)==1)?true:false;
    }
}