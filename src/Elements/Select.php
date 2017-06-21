<?php

namespace App\Http\Libs\Frmapping\Src\Elements;

use App\Http\Libs\Frmapping\Config;

class Select
{
    private $layout;
    private $name,$icon,$alias;

    public function __construct(){
        $this->layout = Config::Layout()->Select;
    }
    public function create($dts){
        $this->name = $dts->name;
        $this->icon = $dts->icon;
        $this->alias = $dts->alias;
        return $this->compiler();
    }
    private function compiler(){
        $string = $this->layout;
        $patterns = array(
            '/:name/',
            '/:icon/',
            '/:alias/'
        );
        $bind = array(
            $this->name,
            $this->icon,
            $this->alias
        );
        return preg_replace($patterns, $bind, $string);
    }

}
