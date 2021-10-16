<?php
    require_once('mainNavigation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Full Fits</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/slide.css">
    <link rel="stylesheet" href="styles/formstyle.css">
    <link rel="stylesheet" href="styles/style.css">



    <script type="text/javascript" src="js/popper.min.js">
    </script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>

</head>


<body>


<br>

<div class="container">
    <header>

    </header>

    <main>
        <h1>Search Results</h1>
        <p>


            <?php

            $searchterm = $_POST['srch-term'];

            $sql="select  * from items INNER JOIN images ON items.ITEM_ID=images.ITEM_ID where description like '%$searchterm%'";

            $result=mysqli_query($conn,$sql);


            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    
                echo "<a href='./itemPage_AddToCartFINAL.php?prod_id=".$row["ITEM_ID"]."'>";
                echo '<img src="images/Photos/'.$row["IMAGE_FILE_NAME"].'" alt="Product Image" height="42" width="42">'; 
                echo "Product: ".$row["Name"]."<br>Description: ".$row["DESCRIPTION"]."<br>Price: $".$row["PRICE"];
                echo "</a>";
                echo "<br><br>";
                }
            }
            else
            {
                echo "no results found";
            }    


            ?>




        </p>

    </main>
</div>
</body>
</html>
