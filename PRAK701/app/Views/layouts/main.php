<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->renderSection('title') ?: 'Persona Library' ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style>
        #bgVideo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.6) contrast(1.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white; 
        }

        .main-box {
            background: rgba(255, 255, 255, 0.05);
            padding: 2.5rem;
            border-radius: 0; 
            text-align: center;
            border: 5px solid #e60000; 
            box-shadow: 8px 8px 0px #000, -2px -2px 0px #fff; 
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1, h2, h3, h4 {
            font-family: 'Bebas Neue', sans-serif;
            color: #fff;
            text-shadow: 2px 2px 0 #e60000, -1px -1px 0 #000; 
        }

        .btn {
            background-color: #fff; 
            color: #e60000;
            border: 3px solid #e60000;
            padding: 0.7rem 1.8rem; 
            font-size: 1.2rem; 
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1.5px; 
            text-transform: uppercase; 
            border-radius: 0; 
            transition: all 0.2s ease-in-out;
            position: relative; 
            box-shadow: 4px 4px 0px #000; 
            font-weight: normal; 
            transform: skewX(-5deg); 

        .btn > * { 
            display: inline-block;
            transform: skewX(5deg);
        }
    }

        .btn:hover {
            background-color: #e60000; 
            color: #fff; 
            border-color: #e60000; 
            box-shadow: 2px 2px 0px #000, 0px 0px 0px 3px #fff; 
            transform: skewX(-5deg) scale(1.05); 
        }

        .btn:active { 
            background-color: #c00000; 
            color: #eee;
            box-shadow: 1px 1px 0px #000;
            transform: skewX(-5deg) scale(1.02);
        }


        .alert {
            font-weight: bold;
        }
    </style>

    <?= $this->renderSection('extra-css') ?>
</head>

<body>
    <video autoplay muted loop playsinline id="bgVideo">
        <source src="<?= base_url('videos/p5_rainy.mp4') ?>" type="video/mp4" />
        Your browser does not support the video tag.
    </video>

    <?= $this->renderSection('content') ?>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <?= $this->renderSection('extra-js') ?>
</body>

</html>