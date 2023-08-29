<?php
require_once "./function/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Gistda Test || SERENITY</title>

    <link rel="stylesheet" href="styles.css">
    <style>
        .floor {
            display: flex;
            justify-content: center;
            align-items: center;
            /* border: 1px solid #ccc; */
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .room {
            width: 80px;
            height: 50px;
            margin: 5px 5px;
            padding: 15px 15px;
            /* background-color: #ccc; */
            border-radius: 7%;
        }

        .pool {
            width: auto;
            background-color: aquamarine;
            border-radius: 7%;
        }
    </style>
</head>

<body>

    <? require "navbar.php"; ?>

    <h1 class="text-center" id="header"><? echo $_GET["zone"] ?> ZONE</h1>
    <? include "control.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>