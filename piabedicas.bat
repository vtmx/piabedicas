@echo off

echo  ------------------------------------------------
echo   Piabedicas
echo  ------------------------------------------------
echo.

D:
cd "D:\Design\Web\XAMPP\"
start xampp-control.exe

C:
cd "C:\Users\vitor\AppData\Local\atom\bin\"
start atom.cmd

D:
cd "D:\Design\Web\XAMPP\htdocs\piabedicas\wp-content\themes\piabedicas\"
gulp