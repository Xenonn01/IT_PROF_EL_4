@echo off
REM ============================================================
REM  Start the CodeIgniter 4 portfolio dev server.
REM  Gamita ang portable PHP 8.3 + Composer sa C:\Users\dell\tools
REM ============================================================
setlocal
set PHP=C:\Users\dell\tools\php83\php.exe
set PORT=8088

cd /d "%~dp0"

echo Starting CodeIgniter dev server at http://localhost:%PORT%
echo Press Ctrl+C to stop.
echo.
"%PHP%" spark serve --host 127.0.0.1 --port %PORT%
endlocal
