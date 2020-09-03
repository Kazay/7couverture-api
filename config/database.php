<?php

$dbopts = parse_url(getenv('DATABASE_URL'));

return [
  'fetch' => PDO::FETCH_CLASS,
  
  'default' => env('DB_CONNECTION', 'pgsql'),

  'connections' => [
    'pgsql' => [
      'driver'   => 'pgsql',
      'host'     => $dbopts["host"],
      'database' => ltrim($dbopts["path"],'/'),
      'username' => $dbopts["user"],
      'password' => $dbopts["pass"],
      'charset'  => 'utf8',
      'prefix'   => '',
      'schema'   => 'public',
    ],
  ],

  'migrations' => 'migrations',
];