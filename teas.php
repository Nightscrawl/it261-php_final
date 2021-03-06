<?php 
    include('includes/config.php');
    include('includes/header.php'); 
?>


<main>

    <h2 class="center">Our Teas</h2>


    <?php

    $sql = 'SELECT * FROM Tea';

    $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die( myerror(__FILE__, __LINE__, mysqli_connect_error()) );
        //  extract the data here

    $result = mysqli_query($iConn, $sql) or die( myerror(__FILE__, __LINE__, mysqli_error($iConn)) );


    // do we have more than 0 rows?
    if( mysqli_num_rows($result) > 0 ) {  // show the records

    ?>

    <table>
    <?php while( $row = mysqli_fetch_assoc($result) ) : ?>

        <tr>
            <td><img src="img/<?php echo $row['TeaImg'] ?>" alt="<?php echo $row['TeaName'] ?>" /></td>
            <td><?php echo $row['TeaName'] ?></td>
            <td><?php echo $row['TeaType'] ?></td>
            <td>$<?php echo $row['TeaPricePerOz'] ?> per oz</td>
        </tr>

    <?php endwhile; ?>
    </table>


    <?php

    } else {  // what if not candidates?

        echo 'Nobody home!';

    }  // close if else


    @mysqli_free_result($result);  // release web server
    @mysqli_close($iConn);  // close connection

    ?>

</main>


<?php include('includes/footer.php'); ?>