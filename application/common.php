<?php
function asset($path) {
    $version = \think\Config::get('version') ?: '';
    return "/assets/" . $path . "?ms=" .$version;
}

//require __DIR__.'/vendor/autoload.php';

function get_wind_class_list() {
    $finder = new Symfony\Component\Finder\Finder;
    $iter = new hanneskod\classtools\Iterator\ClassIterator($finder->in('../application'));

    return $iter;

    // Print the file names of classes, interfaces and traits in 'src'
    //foreach ($iter->getClassMap() as $classname => $splFileInfo) {
    //    echo $classname.': '.$splFileInfo->getRealPath()."\n";
    //}
}


function get_wind_class_methods($classname,$access=null){
    $class = new \ReflectionClass($classname);
    $methods = $class->getMethods();
    $returnArr = array();
    foreach($methods as $value){
        if($value->class == $classname){
            if($access != null){
                $methodAccess = new \ReflectionMethod($classname,$value->name);
                switch($access){
                case 'public':
                    if($methodAccess->isPublic())$returnArr[$value->name] = 'public';
                    break;
                case 'protected':
                    if($methodAccess->isProtected())$returnArr[$value->name] = 'protected';
                    break;
                case 'private':
                    if($methodAccess->isPrivate())$returnArr[$value->name] = 'private';
                    break;
                case 'final':
                    if($methodAccess->isFinal())$returnArr[$value->name] = 'final';
                    break;
                }
            }else{
                array_push($returnArr,$value->name);
            }
            
        }
    }
    return $returnArr;
}
;