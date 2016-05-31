<?php
namespace app\index\controller;

use think\Controller;
use app\admin\controller\Index as AdminIndex;

class Index extends Controller
{
    public function index()
    {
        //$view = new \think\View(['view_suffix'=>'.html','view_depr'=>'/']);
        //$view = new \think\View();
        //return $view->config('parse_str',['__PUBLIC__'=>'/public/', '__ROOT__'=>'/'])->fetch();

        //return $this->fetch('index');
        error_log("\nwindsome class=".__CLASS__.", method=".__METHOD__.', function='.__FUNCTION__.", line=".__LINE__, 3, PHP_LOG_PATH);
        //$class = new \ReflectionClass('Index');//建立 Person这个类的反射类  
        //$methods = $class->getMethods();
        //error_log("\nwindsome reflection class=".print_r($class, true).", methods=".print_r($methods, true), 3, PHP_LOG_PATH);

        //error_log("\nwindsome reflection classes=".print_r(get_defined_functions(), true), 3, PHP_LOG_PATH);

        $admin = require __DIR__.'/../../admin/controller/Index.php';

        //error_log("\nwindsome reflection classes=".print_r(get_declared_classes(), true), 3, PHP_LOG_PATH);

        error_log("\nreflection:", 3, PHP_LOG_PATH);
        $iter = get_wind_class_list();
        foreach ($iter->getClassMap() as $classname => $splFileInfo) {
            error_log("\n".$classname.': '.$splFileInfo->getRealPath(), 3, PHP_LOG_PATH);
            //echo $classname.': '.$splFileInfo->getRealPath()."\n";
            $methods = get_wind_class_methods($classname, 'public');
            error_log("\nmethods=".print_r($methods, true), 3, PHP_LOG_PATH);
            
            //$this->_rr($classname);
        }

        //$this->_rr();
        return $this->fetch('index', [], ['__PUBLIC__'=>'/public/', '__ROOT__'=>'/', '__ASSETS__'=>'/assets']);
    }

    private function _rr($classname) {
        $class = new \ReflectionClass($classname);//建立 Person这个类的反射类  
        $methods = $class->getMethods();
        error_log("\nwindsome reflection class=".print_r($class, true).", methods=".print_r($methods, true), 3, PHP_LOG_PATH);

    }
}
