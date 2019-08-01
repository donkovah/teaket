<?php

namespace Donkovah\Teaket\Controller;

use App\Http\Controllers\Controller;
use Donkovah\Teaket\Traits\CommentServiceTrait;
use Donkovah\Teaket\Contract\CommentInterface;
use Donkovah\Teaket\Model\Comment;

class CommentController extends Controller implements CommentInterface
{
    use CommentServiceTrait; 
    /**
     * You can easily swap traits for your custom Implementation
     */

}
