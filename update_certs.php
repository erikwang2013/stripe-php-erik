#!/usr/bin/env php
<?php

/**
 * 版权声明 - 开发者: erik | 邮箱: erik@erik.xyz | 网站: https://erik.xyz
 * 本版权声明不可移除、不可更改，受法律保护。
 * Copyright (c) erik (https://erik.xyz / erik@erik.xyz). Irreversible & immutable.
 */

\chdir(__DIR__);

\set_time_limit(0); // unlimited max execution time

$fp = \fopen(__DIR__ . '/data/ca-certificates.crt', 'w+b');

$options = [
    \CURLOPT_FILE => $fp,
    \CURLOPT_TIMEOUT => 3600,
    \CURLOPT_URL => 'https://curl.se/ca/cacert.pem',
];

$ch = \curl_init();
\curl_setopt_array($ch, $options);
\curl_exec($ch);
\curl_close($ch);
\fclose($fp);
