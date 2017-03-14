<?php
/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
 * return [
 *     'environment name' => [
 *         'path' => 'directory storing the local files',
 *         'setWritable' => [
 *             // list of directories that should be set writable
 *         ],
 *         'setExecutable' => [
 *             // list of files that should be set executable
 *         ],
 *         'setCookieValidationKey' => [
 *             // list of config files that need to be inserted with automatically generated cookie validation keys
 *         ],
 *         'createSymlink' => [
 *             // list of symlinks to be created. Keys are symlinks, and values are the targets.
 *         ],
 *     ],
 * ];
 * ```
 */
return [
    'Development' => [
        'path' => 'dev',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
            'employer/runtime',
            'employer/web/assets',
            'employer-api/runtime',
            'employer-api/web/assets',
            'student-api/runtime',
            'student-api/web/assets',
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
            'employer/config/main-local.php',
            'employer-api/config/main-local.php',
            'student-api/config/main-local.php',
        ],
    ],
    'Production' => [
        'path' => 'prod',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
            'employer/runtime',
            'employer/web/assets',
            'employer-api/runtime',
            'employer-api/web/assets',
            'student-api/runtime',
            'student-api/web/assets',
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
            'employer/config/main-local.php',
            'employer-api/config/main-local.php',
            'student-api/config/main-local.php',
        ],
    ],
    'Demo' => [
        'path' => 'demo',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
            'employer/runtime',
            'employer/web/assets',
            'employer-api/runtime',
            'employer-api/web/assets',
            'student-api/runtime',
            'student-api/web/assets',
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
            'employer/config/main-local.php',
            'employer-api/config/main-local.php',
            'student-api/config/main-local.php',
        ],
    ],
    'Development Krushn' => [
        'path' => 'dev-krushn',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
            'employer/runtime',
            'employer/web/assets',
            'employer-api/runtime',
            'employer-api/web/assets',
            'student-api/runtime',
            'student-api/web/assets',
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
            'employer/config/main-local.php',
            'employer-api/config/main-local.php',
            'student-api/config/main-local.php',
        ],
    ],
];
