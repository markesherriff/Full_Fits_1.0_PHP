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
		<style>
			fieldset { 
			display: block;
			margin-left: 2px;
			margin-right: 2px;
			padding-top: 0.35em;
			padding-bottom: 0.625em;
			padding-left: 0.75em;
			padding-right: 0.75em;
			border: 2px groove (internal value);
			}
			
			#userInput{

				
			}
			
			#userContainer{
				height: 100%;
				display: flex;
				align-items: center;
				justify-content: center;				
				
			}
			
		</style>

    </head>
    <body>  
<br>

<div class="container">
    <header>

    </header>

    <main>
<?php
//variables
$view_message="";
$user_output = "";
$item_id = "";
$sex = "";
$category_id = "";
$price = "";
$description = "";
$image_file_name = "";
$colours = "";
$sizes = "";
$pageTitle ="";

$colour_id = "";
$size_id = "";
$quantity = "";
$order_id = "";
$order_date = "";
$customer_id = "";
$purchased = "";
$cart = "";

//SEARCH BUTTON FUNCTION 

if(isset($_GET['prod_id'])){
	$item_id = $_GET['prod_id'];
	drawPage($conn, $colours, $sizes, $image_id, $image_file_name, $item_id, $sex, $category, $price, $description, $pageTitle);

}

//A function to populate the contents of the page with values from a row from the items table in the DB
function drawPage(&$conn, &$colours, &$sizes, &$image_id, &$image_file_name, &$item_id, &$sex, &$category, &$price, &$description, &$pageTitle){
	//search for the row associated with the item_id.
	//$item_id = $_GET['prod_id'];
	$search_query = "SELECT item_id, sex, category_id, price, description, name
				FROM items	
				WHERE item_id = '$item_id';";
	
	
	
	
//check that the item_id value exists in the table, fetch and store the returned row 

	if($result = mysqli_query($conn, $search_query)){
		
		
		
		$row = mysqli_fetch_row($result);
		
		//assign the strings in the select query row result to the appropriate variables.
		$item_id =$row[0];
		$sex =$row[1];
		$category_id =$row[2];
		$price =$row[3];
		$description =$row[4];
		$pageTitle = $row[5];
		
		$_SESSION['item_id'] = $row[0];
		
		
		//display notification if no record found
		if(!$row){

			
			$view_message = "NO SUCH ITEM EXISTS";
		}
		
		
		
	
	}
//GET PHOTO - pull the image_file_name from the images table using our $item_id
	
	$search_query_image = "SELECT image_file_name
			FROM images	
			WHERE item_id = '$item_id';";	
				
	if($result = mysqli_query($conn, $search_query_image)){
		
		
		$row = mysqli_fetch_row($result);
		
		//assign the string in the select query row result to the appropriate variable.
		
		$image_file_name =$row[0];
		
		
		//display notification if no image found
		if(!$row){
		
			$view_message = "IMAGE NOT FOUND";
		}
		
		
		
	
	}

// GET LIST OF COLOURS - create string for options in 'Colours' select tag
	//$item_id = $_GET['prod_id'];
	
	$search_query_colours = "SELECT colours.colour_desc, colours.colour_id
			FROM colours
			JOIN images ON colours.colour_id = images.colour_id
			WHERE item_id = '$item_id';";	
				
	if($result = mysqli_query($conn, $search_query_colours)){
		
		
		while($row = mysqli_fetch_row($result)){
		
		
		
		
		$colours = $colours."<option value = ".$row[0].">".$row[0]."</option>";
		
		
		
	}

}
// GET LIST OF SIZES - create string for options in 'sizes' select tag
	
	
	$search_query_sizes = "SELECT sizes.size_desc
			FROM sizes
			JOIN item_size ON item_size.size_id = sizes.size_id
			WHERE item_id = '$item_id';";	
				
	if($result = mysqli_query($conn, $search_query_sizes)){
		
		
		while($row = mysqli_fetch_row($result)){
		
		
		
		
		$sizes = $sizes."<option value = ".$row[0].">".$row[0]."</option>";
		
	}

	}

}






// 'ADD TO CART' BUTTON FUNCTION 
if (isset($_POST['addToCart'])){
	
		
	drawPage($conn, $colours, $sizes, $image_id, $image_file_name, $_SESSION['item_id'], $sex, $category, $price, $description, $pageTitle);
	
	
	//Conditional statements - determine if order item is to be added to existing order
	if(isset($_SESSION['order_id'])){
		
		addOrderItem($conn, $_SESSION['order_id']);
		
		
	}
	if(!isset($_SESSION['order_id'])){
		
		
		addOrder($conn);
		addOrderItem($conn, $_SESSION['order_id']);
	}
	echo "<script>alert('success!');</script>";
}

//A function to create a new order in the DB when one does not already exist
function addOrder(&$conn){
	
	//Initialize variables to be inserted into order row
	//$order_id is not passed - SQL table will set an auto-incremented value
	
	$customer_id = 1001;
	// $customer_id will be set to $_SESSION['customer_id'] once Mark's search page is added
	$purchased = 0;
	$cart = 1;
	//Create SQL INSERT statement for order 
	$insert_query_add_order = "INSERT INTO orders(order_date, customer_id, purchased, cart) VALUES (CURDATE(), $customer_id, $purchased, $cart);";

	//Execute SQL INSERT statement
	$result = mysqli_query($conn, $insert_query_add_order);
	
	
	
		
	//display confirmaton if insert is successful
	if($result){
	
		$view_message = "[ORDER ITEM ADDED TO CART]";
	}
	
	//display notification if insert is unsuccessful
	if(!$result){
	
		$view_message = "ORDER COULD NOT BE ADDED";
	}
	
	// Find last (auto-incremented) Order ID inserted and assign to $_SESSION variable
	
	$search_query_last_order_id = "SELECT LAST_INSERT_ID();";
	
	if($result = mysqli_query($conn, $search_query_last_order_id)){
		
		
		while($row = mysqli_fetch_row($result)){

		$_SESSION['order_id'] = $row[0];
		
		}

	}
}

//A function to insert a new row in the order_items table	
function addOrderItem(&$conn, &$id){
	//Assign values of html form user inputs to php variables
	$order_id = $id;
	$item_id = $_SESSION['item_id'];
	$quantity = $_POST['quantity'];	
	$size_id = getSelectedSizeID($conn);
	$colour_id = getSelectedColourID($conn);
	
	//Create SQL INSERT statement for order 
	$insert_query_add_order_item = "INSERT INTO order_items(order_id, item_id, quantity, size_id, colour_id) VALUES ($order_id, $item_id, $quantity, $size_id, $colour_id);";
	
	//Execute SQL INSERT statement
	$result = mysqli_query($conn, $insert_query_add_order_item);

	//display notification if insert is unsuccessful
	if(!$result){
	
		$view_message = "ORDER_ITEM COULD NOT BE ADDED";
	}
}

//A function to derive the value in size table column 'size_id' which matches the selected value in the form's size dropdown menu
function getSelectedSizeID(&$conn){
	//Store value of selection in size dropdown menu
	$sizeValue = $_POST['size'];
	$this_size_id = "";
	
	//Create and execute SQL search query for size_ID
	$search_query_size_id = "SELECT size_id FROM sizes WHERE size_desc = '$sizeValue';";
	if($result = mysqli_query($conn, $search_query_size_id)){
	
	
	while($row = mysqli_fetch_row($result)){

	$this_size_id = $row[0];
	
	}
	
	//display notification if search is unsuccessful
	if(!$result){
	
		$view_message = "SIZE_ID COULD NOT BE FOUND";
	}
	
	return $this_size_id;
	
}
}

//A function to derive the value in colour table column 'colour_id' which matches the selected value in the form's colour dropdown menu
function getSelectedColourID(&$conn){
	
	
	//Store value of selection in colour dropdown menu
	$colourValue = $_POST['colour'];
	$this_colour_id = "";
	
	
	//Create and execute SQL search query for colour
	$search_query_colour_id = "SELECT colour_id FROM colours WHERE colour_desc = '$colourValue';";
	if($result = mysqli_query($conn, $search_query_colour_id)){
	
	
	while($row = mysqli_fetch_row($result)){

	$this_colour_id = $row[0];
	
	}
	
	//display notification if search is unsuccessful
	if(!$result){
	
		$view_message = "COLOUR_ID COULD NOT BE FOUND";
	}
	
	return $this_colour_id;
}
}
?>	

<!-- ITEM PAGE TITLE - ITEM NAME -->
        <h2 style="text-align:center"><?php echo $pageTitle; ?></h2>
        <p>
<!-- CONTAINER FOR IMAGE AND FORM ELEMENTS-->
<div class = "formContainer" style="text-align:center">

<fieldset>
<?php echo '<img src="images/Photos/'.$image_file_name.'" alt="Selected Item Image" height="400" width="350">' ?>
<br>
<p id="description" ><?php echo $description; ?></p><br>
<span id="price" ><h2>$<?php echo $price;?></h2></span><br>
<span id="message" ><h3><?php echo $view_message; ?></h3></span><br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">


<div id="userContainer" align="center">
<div id="userInput" align="left">
Colour: &nbsp;&nbsp;
		<select onchange="" name="colour">
		<?php echo $colours?>
		</select><br>
Size: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name ="size">
		<?php echo $sizes?>
		</select><br>	
Quantity: <input type="number" name ="quantity" min="0"><br>
</div>
</div>
	

<br><br>
<div id="buttonBox">
<button class="btn btn-outline-primary text-dark" type="submit" name="addToCart" value="ADD TO CART">ADD TO CART</button>
<a class="btn btn-outline-primary text-dark" name="goToCheckout" value="GO TO CHECKOUT" href="checkout.php">GO TO CHECKOUT</a><br><br>
</div>
</fieldset>
</form>

</div>
        </p>

    </main>
</div>


<br>
</body>
</html>