<?php
return [
    'role' => [
        [
           'admin' => '1',
           'privilages' => [

           ],
        ],
        [   
            'manager' => '2',
            'privilages' => [
                'managers.index',
                'managers.create',
                'managers.edit',
                'managers.update',
                'managers.destroy',
                'customers.index',
                'customers.create',
                'customers.edit',
                'customers.update',
                'customers.destroy',
             ],
        ],     
        ['customer' => '3',
          'privilages' => [
            'customers.create',
          ],
    ],
],
    'pagination' => 10
];
