<?php

return [
    'contact_email' => [
        'env'      => 'CONTACT_EMAIL',
        'bind'     => 'streams::contact_email',
        'type'     => 'anomaly.field_type.email',
        'required' => true,
    ],
];
