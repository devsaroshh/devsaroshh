<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS for sidebar */
        .sidebar {
            height: 100%;
            width: 250px; /* Adjust width as needed */
            position: fixed;
            top: 0;
            left: 0;
            background-color:  #6BA9B9;
            padding-top: 20px;
            overflow-y: auto; /* Make sidebar scrollable */
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: #6BA9B9; /* Text color */
            display: block;
            background-color: #6BA9B9; /* Button color */
        }

        .sidebar a:hover,
        .sidebar a:focus {
            background-color: #6BA9B9; /* Hover color */
            color: white; /* Text color on hover */
        }

        .sidebar a:active {
            background-color: #6BA9B9; /* Click color */
            color: white; /* Text color on click */
        }

        .content {
            padding: 16px;
            margin-left: 250px; /* Adjust based on sidebar width */
        }

        .dropbtn {
            background-color: #6BA9B9; /* Button color */
            color: white; /* Text color */
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            width: 100%; /* Full width for buttons */
            text-align: left; /* Align text to the left */
        }

        .dropdown {
            position: relative;
            display: block; /* Make dropdown a block element */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            width: 100%; /* Full width for dropdown content */
            text-align: left; /* Align text to the left */
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: gray;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        #logout{

            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding-top: 0;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2 style="color: white;text-align:center">Welcome</h2>

        <div class="dropdown">
            <button class="dropbtn">User Management</button>
            <div class="dropdown-content">
                <a href="userManagement.php">Add User</a>
                <!-- <a href="view_products.php">View Products</a> -->
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Manage Products</button>
            <div class="dropdown-content">
                <a href="add_product.php">Add New Product</a>
                <a href="view_products.php">View Products</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Sales</button>
            <div class="dropdown-content">
                <a href="add_sale.php">Add Sale</a>
                <a href="view_sales.php">View Sales</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Inventory</button>
            <div class="dropdown-content">
                <a href="add_inventory_change.php">Add Inventory</a>
                <a href="view_inventory.php">View Inventory</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Categories</button>
            <div class="dropdown-content">
                <a href="add_category.php">Add New Category</a>
                <a href="view_categories.php">View Categories</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Subcategories</button>
            <div class="dropdown-content">
                <a href="add_subcategory.php">Add New Subcategory</a>
                <a href="view_subcategories.php">View Subcategories</a>
            </div>
        </div>
        <a href="logout.php" id="logout">Logout</a>
    </div>

</body>
</html>