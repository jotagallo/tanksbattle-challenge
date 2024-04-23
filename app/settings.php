<?php
/**
 * Settings files for connection variables and other stuff.
 */
$mongodb = "mongodb://root:root@host.docker.internal:27017/admin?ssl=false";
/* I know it's not good to hardcode and duplicate connection string,
I would put in an .env file, but for the sake of simplicity let's keep like this */
$dbname = 'tanksbattle';