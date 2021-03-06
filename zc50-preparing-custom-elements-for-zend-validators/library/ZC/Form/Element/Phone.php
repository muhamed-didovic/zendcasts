<?php

class ZC_Form_Element_Phone 
    extends Zend_Form_Element_Xhtml
{
    public $helper = "phoneElement";
    protected $areanum = null;
    protected $localnum = null;
    protected $geonum = null;

    function setAreaNum($num)
    {
        $this->areanum = $num;
        return $this;
    }

    function setGeoNum($num)
    {
        $this->geonum = $num;
        return $this;
    }

    function setLocalNum($num)
    {
        $this->localnum = $num;
        return $this;
    }

    

    public function setValue($value)
    {
        if (is_array($value)
                &&(isset($value['localnum']))
                &&(isset($value['geonum']))
                &&(isset($value['areanum']))
                )
        {
            $this->setAreaNum($value['areanum'])
                 ->setGeoNum($value['geonum'])
                 ->setLocalNum($value['localnum']);
        }
    }

    public function getValue()
    {
        if (! $this->areanum || ! $this->geonum || ! $this->localnum)
                return false;
        return $this->areanum .'-'. $this->geonum .'-' . $this->localnum;
    }
}

