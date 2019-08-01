<?php
namespace Donkovah\Teaket\Contract;

use App\User;
use Donkovah\Teaket\Model\Teaket;
use Illuminate\Http\Request;
use Donkovah\Teaket\Model\Comment;

interface CommentInterface 
{
    public function index(Teaket $teaket); 

    public function store(Request $request, Teaket $teaket); 

    public function update(Request $request, Comment $comment); 
 
    public function notifyTeaketMembers(Teaket $teaket);


}