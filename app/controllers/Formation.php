<?php

namespace App\controllers;

use App\models\Dreadnought;
use App\models\Interceptor;
use App\models\Leviathan;
use App\models\Recreation;
use App\models\Transport;

class Formation
{
    /**
     *
     * @var array
     */
    protected $dreadnought = [];

    /**
     *
     * @var array
     */
    protected $interceptor= [];

    /**
     *
     */
    protected $leviathan = [];

    /**
     *
     * @var array
     */
    protected $recreation = [];

    /**
     *
     * @var array
     */
    protected $transport = [];

    /**
     *
     * @var array
     */
    protected $civil = [];

    /**
     *
     * @var array
     */
    protected $military = [];

    /**
     *
     * @var array
     */
    protected $military1 = [];

    /**
     *
     * @var array
     */
    protected $attack = [];

    /**
     *
     * @var array
     */
    protected $escort = [];
    

    /**
     * Construct
     */
    public function __construct($attack = [], $escort = [])
    {
        $this->set_attack_params($attack);
        $this->attack = [$this->dreadnought, $this->interceptor, $this->leviathan, $this->recreation, $this->transport];

        $this->set_escort_params($escort);
        $this->escort = [$this->military, $this->civil, $this->military1];
    }

    /**
     *
     * @return string
     */
    public function attack()
    {
        $output = '';

        if($this->attack) {
            foreach($this->attack as $items) {

                if($items == []) continue;

                $output .= implode(", ", $items);
                $output .= "<br>";
            }
        }

       return $output;
    }

    /**
     *
     * @return string
     */
    public function escort()
    {
        $output = '';

        if($this->escort) {
            foreach($this->escort as $items) {
                
                if($items == []) continue;

                $output .= implode(", ", $items);
                $output .= "<br>";
            }
        }

        return $output;
    }

    /**
     *
     * @param array $attack
     */
    private function set_attack_params($attack)
    {
        for ($i = 0; $i < sizeof($attack); $i++) {

            $this->set_attack_param(Dreadnought::class, $attack, $i, 'dreadnought');
            $this->set_attack_param(Interceptor::class, $attack, $i, 'interceptor');
            $this->set_attack_param(Leviathan::class, $attack, $i, 'leviathan');
            $this->set_attack_param(Recreation::class, $attack, $i, 'recreation');
            $this->set_attack_param(Transport::class, $attack, $i, 'transport');
        }
    }

    /**
     *
     * @param array $escort
     */
    private function set_escort_params($escort)
    {
        for ($i = 0; $i < sizeof($escort); $i++) {

            if ($escort[$i]->parent == 'Civil') {
                $this->civil[] = $escort[$i];
            }

            if ($escort[$i]->parent == 'Military') {
                $this->military[] = $escort[$i];
            }
        }

        $insert_position = (int)(count($this->military)/2)+1;
        $this->military1 = array_slice($this->military, $insert_position, count($this->military)-1);
        array_splice($this->military, $insert_position, count($this->military)-1);
    }

    /**
     *
     * @param class $class
     * @param array $attack
     * @param int $i
     * @param string $ship
     */
    private function set_attack_param($class, $attack, $i, $ship)
    {
        if ($class::$strong == $attack[$i]::$strong) {
            if ($attack[$i]->junior == false) {
                array_unshift($this->$ship, $attack[$i]);
            } else {
                array_push($this->$ship, $attack[$i]);
            }
        }
    }
}