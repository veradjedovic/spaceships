<?php

namespace App\models;

abstract class Ship
{
    /**
     *
     * @var int
     */
    protected $id;

    /**
     *
     * @var bool
     */
    public $junior;

    /**
     *
     * @var string
     */
    public $class_name;

    /**
     *
     * @var string
     */
    public $parent;
    

    /**
     * Construct
     */
    public function __construct($id, $junior)
    {
        $this->id = $id;
        $this->junior = $junior;
        $this->class_name = substr(get_class($this), strrpos(get_class($this), '\\') + 1);
        $this->parent = substr(get_parent_class($this), strrpos(get_parent_class($this), '\\') + 1);
    }

    /**
     * toString Method
     */
    public function __toString()
    {
        if($this->junior == true) {
            return $this->class_name . ' ' .$this->id . ' Junior ';
        } else {
            return $this->class_name . ' ' . $this->id . ' ';
        }
    }
}