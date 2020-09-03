<?php

$dbopts = parse_url(getenv('DATABASE_URL'));

return [
'DB_CONNECTION' => 'pgsql',
'DB_HOST' => $dbopts["host"],
'DB_PORT' =>  $dbopts["port"],
'DB_DATABASE' => ltrim($dbopts["path"],'/'),
'DB_USERNAME' => $dbopts["user"],
'DB_PASSWORD' => $dbopts["pass"],
];