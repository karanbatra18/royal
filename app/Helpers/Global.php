<?php

use App\Models\Caste;

function display_caste($user_id) {
    $casteName = '';
    $userProfile = \App\Models\UserProfile::where('user_id', $user_id)->first();
    if(!empty($userProfile) && !empty($userProfile->caste_id)){
        $caste = Caste::where('id', $userProfile->caste_id)->first();
        $casteName = $caste->name;
    }
    return $casteName;
}