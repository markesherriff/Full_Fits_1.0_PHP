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
        <form action="advanced.php" method="post">

        <h1>Advanced Search</h1>

        <div class="form-group row">    
            <label class="col-form-label text-md-right col-md-2">Item Name:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="name" maxlength="50" size="10" autofocus>
            </div>
        </div>
                
        
        <div class="form-group row">     
            <label class="col-form-label text-md-right col-md-2">Item ID:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="id" maxlength="4" size="10">
            </div>         
        </div>

        <div class="form-group row">                
            <label class="col-form-label text-md-right col-md-2">Price Greater Than:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="greater" pattern="^[0-9]*$" maxlength="4" size="20">
            </div>
        </div>    

        <div class="form-group row">                
            <label class="col-form-label text-md-right col-md-2">Price Lower Than:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="less" pattern="^[0-9]*$" maxlength="4" size="20">
            </div>
        </div>

        <div class="form-group row">    
            
            
            <fieldset class="col-form-label text-md-right col-md-2" id='radFieldset'>
                Gender:    
            </fieldset> 
            <div class="col-md-4">
                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked"; ?> value="m" checked>Male
    
                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked"; ?> value="w">Female

                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="both") echo "checked" ; ?>value="">Both

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

        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
        </form>

    </main>
</div>


<br>

<footer>



    &copy; 2019
</footer>
</body>
</html>