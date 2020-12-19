<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?php echo $title; ?></title>
        <meta name="author" content="K. Abell" />
        <meta charset="utf-8" />
        <!-- <meta name="viewport" content="width=device-width,inital-scale=1" /> -->
        <meta name="robots" content="noindex,nofollow" />
        <link href="css/reset.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Asul:wght@400;700&display=swap" rel="stylesheet">
    </head>
    
    <body>
    
        <div class="container">

            <header>

                <div class="inner">
                    <h1 class="title">Tevinter Teas</h1>
                </div>

            </header>

            <nav>

                <div class="inner">

                    <!-- <ul>
                        <li><a href="#">nav1</a></li>
                        <li><a href="#">nav2</a></li>
                        <li><a href="#">nav2</a></li>
                        <li><a href="#">nav2</a></li>
                        <li><a href="#">nav2</a></li>
                    </ul> -->

                    <ul>
                        <?php echo makeLinks($nav); ?>
                    </ul>  

                </div>

            </nav>

            <div class="content inner <?php echo $layout; ?>">
            <!-- end header.php -->
