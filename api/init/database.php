<?php
session_start();

$conn = pg_connect("postgresql://postgres.ikxdkkhocovnkjdunnoi:LZnBp*4M+D%mR%3@aws-0-ap-northeast-2.pooler.supabase.com:6543/postgres");

if ($conn === false) {
    var_dump(error_get_last());
    exit;
}