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

            $itemName = $_POST['name'];
            $itemID = $_POST['id'];
            $greater = $_POST['greater'];
            $less = $_POST['less'];
            $category = $_POST['category'];
            $gender = $_POST['gender'];


            if ($itemName == ""){
                $searchItem = "";
            } else {
                $searchItem = "AND name like '%$itemName%'";
            }


            if ($itemID == ""){
                $searchID = "";
            } else {
                $searchID = "AND items.ITEM_ID = $itemID";
            }


            if ($greater == ""){
                $searchGreater = "";
            } else {
                $searchGreater = "AND items.PRICE > $greater";
            }

            if ($less == ""){
                $searchLess = "";
            } else {
                $searchLess = "AND items.PRICE < $less";
            }

            if ($category == ""){
                $searchCat = "";
            } else {
                $searchCat = "AND categories.CATEGORY_NAME = '$category'";
            }

            if ($gender == ""){
                $searchGen = "";
            } else {
                $searchGen = "AND items.sex = '$gender'";
            }



            $sql= "select  * from items INNER JOIN images ON items.ITEM_ID=images.ITEM_ID INNER JOIN categories ON items.CATEGORY_ID=categories.CATEGORY_ID
                    where items.ITEM_ID=images.ITEM_ID $searchItem $searchID $searchGreater $searchLess $searchCat $searchGen";

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


<br>
</body>
</html>
