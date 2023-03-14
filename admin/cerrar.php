<?php
session_start();
session_destroy();
header('Location: http://localhost/simple-pagina-web-autoadministrable/admin/login');