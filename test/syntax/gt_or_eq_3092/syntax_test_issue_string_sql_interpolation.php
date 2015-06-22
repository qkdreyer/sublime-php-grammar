// SYNTAX TEST "Packages/php-grammar/PHP.tmLanguage"
<?php

// See https://github.com/jobedom/sublime-php-modern/issues/12#issuecomment-70900164

// Works
$q = <<<SQL
SELECT * FROM users WHERE active;
// ^ source.sql keyword
//          ^ source.sql keyword
//                  ^ source.sql keyword
SQL;

// Works
$q = <<<SQL


SELECT * FROM users WHERE active;
// ^ source.sql keyword
//          ^ source.sql keyword
//                  ^ source.sql keyword

SELECT *
// ^ source.sql keyword
            FROM users WHERE active;
//          ^ source.sql keyword
                    WHERE active;
//                  ^ source.sql keyword

SQL;

// Works
$qry = "SELECT * FROM users WHERE deleted = 0;"
//         ^ source.sql keyword
//                  ^ source.sql keyword
//                          ^ source.sql keyword

// Works
$qry = "                     SELECT * FROM users WHERE deleted = 0;"
//                              ^ source.sql keyword
//                                      ^ source.sql keyword
//                                                  ^ source.sql keyword

// Works
$qry = "                     SELECT
//                              ^ source.sql keyword
        *
//      ^ source.sql keyword
//      ^ source.sql keyword
    FROM users
//  ^ source.sql keyword
    WHERE deleted = 0;"
//  ^ source.sql keyword

// Doesn't Work
$qry = "
SELECT * FROM users WHERE deleted = 0;"
//  ^ source.sql keyword
//          ^ source.sql keyword
//                  ^ source.sql keyword

// Doesn't Work
$qry = "
    SELECT * FROM users WHERE deleted = 0;"
//  ^ source.sql keyword
//              ^ source.sql keyword
//                      ^ source.sql keyword
