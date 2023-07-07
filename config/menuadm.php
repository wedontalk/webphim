<?php
    return [
        [
            'label' => 'danh mục',
            'segment' => 'danhmuc',
            'route' => 'danhmuc.index',
            'icon' => 'bi bi-hexagon-fill',
            'items' =>
            [
                [
                'label' => 'xem danh mục',
                'route' => 'danhmuc.index'
                ],
                [
                'label' => 'thêm danh mục',
                'route' => 'danhmuc.create'
                ],
            ]

        ],
        [
            'label' => 'server',
            'segment' => 'server',
            'route' => 'server.index',
            'icon' => 'bi bi-stack',
            'items' =>
            [
                [
                'label' => 'danh sách server',
                'route' => 'server.index'
                ]
            ]

        ],
        [
            'label' => 'Anime',
            'segment' => 'phim',
            'route' => 'phim.index',
            'icon' => 'bi bi-stack',
            'items' =>
            [
                [
                'label' => 'xem Anime',
                'route' => 'phim.index'
                ],
                [
                'label' => 'thêm Anime',
                'route' => 'phim.create'
                ],
            ]

        ],
        [
            'label' => 'slider',
            'segment' => 'slider',
            'route' => 'slider.index',
            'icon' => 'bi bi-stack',
            'items' =>
            [
                [
                'label' => 'xem slider',
                'route' => 'slider.index'
                ]
            ]
        ],
        [
            'label' => 'Báo lỗi',
            'segment' => 'baoloi',
            'route' => 'baoloi.index',
            'icon' => 'bi bi-stack',
            'items' =>
            [
                [
                'label' => 'xem báo lỗi',
                'route' => 'baoloi.index'
                ]
            ]
        ],
        [
            'label' => 'file tệp',
            'segment' => 'file',
            'route' => 'file',
            'icon' => 'bi bi-stack',
            'items' =>
            [
                [
                    'label' => 'QL file tệp',
                    'route' => 'file'
                ]
            ]
        ],
        [
            'label' => 'Cài Đặt',
            'segment' => 'caidat',
            'route' => 'caidat.qlcauhinh',
            'icon' => 'bi bi-stack',
            'items' =>
            [
                [
                    'label' => 'Quản lý cấu hình',
                    'route' => 'caidat.qlcauhinh'
                ],
                [
                'label' => 'Quản lý quảng cáo',
                'route' => 'caidat.quangcao'
                ],
                [
                'label' => 'Quản lý seo',
                'route' => 'caidat.metaseo'
                ],
                [
                'label' => 'Quản lý thông báo',
                'route' => 'caidat.viewthongbao'
                ]
            ]
        ]
        


    ]


?>