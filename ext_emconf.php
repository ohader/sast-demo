<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'SAST Demo',
    'description' => 'SAST Demo',
    'category' => 'misc',
    'state' => 'beta',
    'clearCacheOnLoad' => 1,
    'author' => 'Oliver Hader',
    'author_email' => 'oliver.hader@typo3.org',
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99'
        ],
    ],
];
