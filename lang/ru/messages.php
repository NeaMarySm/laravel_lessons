<?php

return [
    'admin' => [
        'categories' => [
            'create' => ['success' => 'Категория успешно добавлена',
                         'fail' => 'Ошибка добавления'
            ],
            'update' => ['success' => 'Категория успешно обновлена',
                        'fail' => 'Ошибка обновления'
            ]
        ],
        'news' => [
            'create' => ['success' => 'Новость успешно добавлена',
                         'fail' => 'Ошибка добавления'
            ],
            'update' => ['success' => 'Новость успешно обновлена',
                        'fail' => 'Ошибка обновления'
           ]
        ],
        'sources'=> [
            'create' => ['success' => 'Источник успешно добавлен',
                         'fail' => 'Ошибка добавления'
                        ],
            'update' => ['success' => 'Источник успешно обновлен',
                        'fail' => 'Ошибка обновления'
                        ],
           
        ],
        'users' => [
            'update' => [
                'success' => 'Статус успешно обновлен',
                'fail' => 'Ошибка обновления'
            ],
        ],

    ],

    'feedback' => ['success' => 'Отзыв успешно отправлен',
                    'fail' => 'Отзыв не отправлен. Попробуйте снова.'
                    ],
    'account' => [
        'profile' => [
            'edit' => ['success' => 'Профиль успешно обновлен',
                        'fail' => [ 'password' => 'Введеный пароль не совпадает с текущим. Попробуйте снова.',
                                    'validation' => 'Ошибка обновления. Попробуйте снова.'
                                    ]
                        ]
            ]
        ],
];