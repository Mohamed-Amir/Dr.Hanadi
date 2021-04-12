<?php
/**
 * @return string
 */
function getLogo(){
    return '/Fronted/images/logo.png';
}

/**
 * @param $image
 * @return mixed|string
 */
function getAdminImage($image){
    if($image)
        return getImageUrl('Admin',$image);
    return defaultImages(2);
}


function getNameInIndexPage(){
    return 'Dr.Hanadi';
}

function getCounts($model){
    return $model->count();
}

/**
 * @param $admin
 * @return array
 */
function adminsRoleArray($admin){
    if($admin->id != 1) {
        $array = [];
        foreach ($admin->roles as $row) {
            $array[] = $row->id;
        }
    }else{
        $array=[1,2,3,4,5,6,7,8,9,10,11,12,13];
    }
    return $array;
};

/**
 * @return array
 */
function slidersMainLinks(){
    return [
        ['icon-File-TextImage','الاقسام','Sections.index'],
    ];
};




