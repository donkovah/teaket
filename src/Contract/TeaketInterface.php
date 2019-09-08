<?php
namespace Donkovah\Teaket\Contract;

use Illuminate\Database\Eloquent\Model;
use Donkovah\Teaket\Model\Teaket;
use Illuminate\Http\Request;

interface TeaketInterface {

    /**
     * get all tickets from DB or cloud
    */
    public function index(Model $model);

    /**
     * get a ticket from DB or cloud
    */
    public function show(Teaket $teaket);

    /** 
     * just incase we decide to store ticket in the cloud someday
    */
    public function store(Request $request);
 
    /**
     * send notifications via specific chanells
    */
    public function sendTeaketNotification();
     
    /**
     * assign teaket to administrator
    */
    public function assignTeaketTo(Teaket $teaket, User $admin);
    
    /**
     * get all closed tickets from DB or cloud
    */
    public function getClosedTeakets($start_date = null, $end_date = null);

    /**
     * get closed teakets by this admin
    */
    public function getAdminClosedTeakets(Model $admin);

    /**
     * get all tickets from DB or cloud
    */
    public function getAdminOpenTeakets(Model $user);
    
    /**
     * get all tickets from DB or cloud
    */
    public function getUserClosedTeakets(Model $user);
    
    /**
     * Calculate teaket time
    */
    public function getTotalTimeSpentOnTeaket(Teaket $teaket);

    public function moveTicketToArchive(Teaket $teaket);

    public function getAdminCategory($admin);

}