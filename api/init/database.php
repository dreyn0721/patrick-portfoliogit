<?php
session_start();

$conn = pg_connect("postgresql://postgres.eehwamaettsqfxwvopks:herecomesthedisaster@aws-0-ap-southeast-2.pooler.supabase.com:6543/postgres");

if ($conn === false) {
    var_dump(error_get_last());
    exit;
}