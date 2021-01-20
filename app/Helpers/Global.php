<?php

use App\Models\Caste;
use App\Models\SitePermission;

if (! function_exists('display_caste')) {
    function display_caste($user_id)
    {
        $casteName = '';
        $userProfile = \App\Models\UserProfile::where('user_id', $user_id)->first();
        if (!empty($userProfile) && !empty($userProfile->caste_id)) {
            $caste = Caste::where('id', $userProfile->caste_id)->first();
            $casteName = $caste->name;
        }
        return $casteName;
    }
}

if (! function_exists('getModulePermission')) {
    function getModulePermission($userId, $moduleId)
    {
        return SitePermission::where(['user_id' => $userId, 'site_module_id' => $moduleId])->first();
    }
}
if (! function_exists('messageResponse')) {
    function messageResponse($responseType, $alertType, $message)
    {
        return $notification = [
            'success' => $responseType,
            'alert-type' => $alertType,
            'message' => $message,
        ];
    }
}