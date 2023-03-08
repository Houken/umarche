<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestClassBase extends Component
{
    public $classBaseMessage;
    public $defaultMessage;
    // メンバ変数を定義
    /**
     * Create a new component instance.
     */
    public function __construct($classBaseMessage, $defaultMessage='メッセージの初期値なんだね')
    {
        // 変数とか
        $this->classBaseMessage = $classBaseMessage;
        // メンバ変数$classBaseMessageを引数で初期化
        $this->defaultMessage = $defaultMessage;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // ここから変数を返す必要はない
        return view('components.tests.test-class-base-component');
    }
}
