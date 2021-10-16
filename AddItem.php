<?php
    require_once('adminNavigation.php');
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
        

        <h1>Add New Product</h1>

        <form action="addItem.php" method="post">

        <div class="form-group row">    
            <label class="col-form-label text-md-right col-md-2">Item Name:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="name" maxlength="50" size="10" autofocus>
            </div>
        </div>

        <div class="form-group row">     
            <label class="col-form-label text-md-right col-md-2">Item ID:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="id" pattern="^[0-9]*$"  maxlength="4" size="10">
            </div>         
        </div>
                
        
        <div class="form-group row">     
            <label class="col-form-label text-md-right col-md-2">Price:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="price" pattern="^[0-9]*$"  maxlength="" size="10">
            </div>         
        </div>


         <div class="form-group row">
            <label class="col-form-label text-md-right col-md-2">Desctiption:</label>
            <div class="col-md-4">
                <textarea class="form-control" id="txtComments" name="decription"  rows="4" cols="50"></textarea>
            </div>
        </div>    



         <div class="col-form-label text-md-right col-md-2">
            <label for="inputState">Category: </label>
            <select name="category" class="form-control">
                <option></option>
            <?php

            $servername="localhost";
            $username="root";
            $password="";
            $database="fullfitsdb";


            $conn=mysqli_connect($servername,$username,$password,$database);

            if(!$conn)
            {
                die("connection failed: ".mysqli_connect_error());
            }

            $searchterm = $_POST['srch-term'];



            $sql="select DISTINCT CATEGORY_NAME from items INNER JOIN categories ON items.CATEGORY_ID=categories.CATEGORY_ID";

            $result=mysqli_query($conn,$sql);


            if(mysqli_num_rows($result))
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    
                echo "<option value = '$row[CATEGORY_NAME]'>$row[CATEGORY_NAME]</option>";
                }
            }    



            ?>


            </select>
        </div>





        <div class="form-group row">    
            
            
            <fieldset class="col-form-label text-md-right col-md-2" id='radFieldset'>
                Gender:    
            </fieldset> 
            <div class="col-md-4">
                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked"; ?> value="M" checked>Male
    
                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked"; ?> value="W">Female
            </div>
        </div>  





        <input class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" value="Submit">

        </form>

        
        <?php

        $servername="localhost";
        $username="root";
        $password="";
        $database="fullfitsdb";

        $conn=mysqli_connect($servername,$username,$password,$database);

        if(!$conn)
        {
            die("connection failed: ".mysqli_connect_error());
        }

        
    if (isset($_POST['Submit'])) {
        $Name = $_POST['name'];
        $ID = $_POST['id'];
        $category = $_POST['category'];
        $desc = $_POST['decription'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $gender =  $_POST['gender'];

        $catID= "select DISTINCT ITEMS.CATEGORY_ID from items INNER JOIN categories ON items.CATEGORY_ID=categories.CATEGORY_ID 
        INNER JOIN images ON items.ITEM_ID=images.ITEM_ID where CATEGORY_NAME = '$category' ";

        $categorysql=mysqli_query($conn,$catID);

        if(mysqli_num_rows($categorysql)>0)
            {
                while($row=mysqli_fetch_assoc($categorysql))
                {
                    $categoryID = $row["CATEGORY_ID"];
                }
            }



        $sql="insert into items (Name, ITEM_ID, SEX, CATEGORY_ID,DESCRIPTION,PRICE)
        values ('$Name', $ID, '$gender', $categoryID, '$desc', '$price')";
 
        

        if(mysqli_query($conn,$sql))
        {

            $ID=mysqli_insert_id($conn);
            echo "insert new record successful.";
            echo "$categoryID";

        }

        else{
            echo "error on insert ".mysqli_error($conn);
            echo "$categoryID";
        }

        }

        ?>

    </main>
</div>


<br>
</body>
</html>