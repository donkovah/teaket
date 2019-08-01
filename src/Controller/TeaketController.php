<?php

namespace Donkovah\Teaket\Controller;

use App\Http\Controllers\Controller;
use Donkovah\Teaket\Traits\TeaketServiceTrait;
use Donkovah\Teaket\Contract\TeaketInterface;
use Donkovah\Teaket\Model\Teaket;

class TeaketController extends Controller implements TeaketInterface
{
    use TeaketServiceTrait; 
    /**
     * You can easily swap traits for your custom Implementation
     */
}
