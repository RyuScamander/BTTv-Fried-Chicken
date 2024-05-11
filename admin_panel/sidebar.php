<?php
// Start the session

$is_admin = !empty($_SESSION['admin_fname']);
?>

<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
    <div class="side-header">
        <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection">
        <h5 style="margin-top:10px;">Hello, Admin</h5>
    </div>

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php"><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers" id="customersLink" onclick="return handleUnauthorizedAccess(event, 'showCustomers')"><i class="fa fa-users"></i> Customers</a>
    <a href="#category" id="categoryLink" onclick="return handleUnauthorizedAccess(event, 'showCategory')"><i class="fa fa-th-large"></i> Category</a>
    <a href="#productsizes" id="productSizesLink" onclick="return handleUnauthorizedAccess(event, 'showProductSizes')"><i class="fa fa-th-list"></i> Product Stock</a>
    <a href="#products" id="productsLink" onclick="return handleUnauthorizedAccess(event, 'showProductItems')"><i class="fa fa-th"></i> Products</a>
    <a href="#orders" id="ordersLink" onclick="return handleUnauthorizedAccess(event, 'showOrders')"><i class="fa fa-list"></i> Orders</a>
</div>

<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>

<script>
    const isAdmin = <?php echo json_encode($is_admin); ?>;

    // Function to handle unauthorized access
    function handleUnauthorizedAccess(event, functionName) {
        if (!isAdmin) {
            event.preventDefault(); // Prevent the default action
            alert("You need to log in with an admin account to use this feature!");
            location.href = "login/login_form.php"; // Redirect to the login page
            return false; // Prevent the default navigation
        } else {
            window[functionName](); // Execute the intended function if authorized
            return false; // Prevent the default navigation
        }
    }
</script>
