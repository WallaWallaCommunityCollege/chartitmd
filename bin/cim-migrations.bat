@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0cim-migrations
php "%BIN_TARGET%" %*
