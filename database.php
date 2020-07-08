<?php
session_start();

$conn = new mysqli("localhost", "root", "", "php_tasks_db");
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
