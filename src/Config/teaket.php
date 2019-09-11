<?php

return [
    
    /**
     * change to your desired app middleware 
     */
    'middleware' => 'auth',


    /**
     * url prefix for web or api routes
     */
    'url_prefix' => 'ticket',

    /**
     * route type ['web', 'api']
     */
    'route' => 'web',

    /**
     * select true if your app uses queues
     */
    'queue' => false,

    /**
     * select response between 'json' or 'view'.
     */
    'return_response' => 'json',

    /**
     * Name of status each ticket would have
     */
    'status' => [
        ['id' => 1, 'name' => 'Pending'], //default for new ticket
        ['id' => 2, 'name' => 'Ongoing'],
        ['id' => 3, 'name' => 'Completed'],
    ],

    /**
     * Ticket category should determine options of Admins
     * to be assigned.
     */
    'category' => [
        ['id' => 1, 'name' => 'HR'],
        ['id' => 2, 'name' => 'Tech'],
        ['id' => 3, 'name' => 'Audit'],
        ['id' => 4, 'name' => 'Finance'],
        ['id' => 5, 'name' => 'Others'],
    ],

    /**
     * category column name in user table.
     */
    'category_column' => 'catagory_id',

    /**
     * High and Critical priorities would generate a mail to the admin
     * when ticket is created.
     */
    'priority' => [
        ['id' => 1, 'name' => 'Low'],
        ['id' => 2, 'name' => 'Average'],
        ['id' => 3, 'name' => 'High'],
        ['id' => 4, 'name' => 'Critical'],
    ],

    /**
     * Listen to ticket events
     */
    "emit_event" => true, // change to false if you dont listen to event

    /**
     * change to false if you do not use queues
     */
    "queue" => true, // change to false if you dont listen to event

    /**
     * how long should your queue wait before fired.
     */
    "queue_delay" => 60,



];