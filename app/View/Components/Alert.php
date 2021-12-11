<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The priority of the alert, i.e., "info", or "warning"
     * 
     * @var string
     */
    public $level;

    /**
     * The message or an array of messages o present to the user
     * 
     * @var mixed
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @param string    $level;
     * @param mixed     $message;
     */
    
    public function __construct(string $level = 'info', $message = [])
    {
        $this->level    = $level;
        $this->message  = $message;
    }

    public $show;

    public function mount() {
        $this->show = false;
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function doSomething() {
        $this->doClose();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render() : View
    {
        return view('components.alert');
    }
}
