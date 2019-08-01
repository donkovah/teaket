<?php
namespace Donkovah\Teaket\Contract;

interface TeaketModelInterface {

    public function myTeakets();

    public function teakets();
    
    public function openTeakets();
    
    public function closedTeakets();
}