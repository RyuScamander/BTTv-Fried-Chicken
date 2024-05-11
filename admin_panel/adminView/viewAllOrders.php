
<div id="ordersBtn">
<h2>Order Details</h2>
    <div class="row">
        <div class = "col-md-5">
        </div>
        <div class ="col-md-7">
          <form action="" method ="GET">
            <div class="row">
              <div class="col-md-4">
                <input type="date" name="order_date" required value ="<?= isset($_GET['order_date']) == true ? $_GET['order_date']:''?>" class="form-control">
              </div>
              <div class="col-md-4">
                <select name="order_status" required class="form-select">
                  <option value ="">Select Status</option>
                  <option value="Pending" 
                    <?= isset($_GET['order_status']) == true ? ($_GET['order_status'] == 'Pending' ? 'selected':''):'' ?>>
                    Pending
                  </option>
                  <option value="Delivered" 
                    <?= isset($_GET['order_status']) == true ? ($_GET['order_status'] == 'Delivered' ? 'selected':''):'' ?>>
                  Delivered
                </option>
                </select>
            </div>
            <div class="col-md-4">
              <button id="applyFilterBtn" class="btn btn-success" style="height:40px" onclick="OrderFilter()">Apply Filter</button>
              <a href="" class="btn btn-danger" style="height: 40px;">Reset</a>
            </div>
        </div>
    </div>
    <table id ="ordersTable" class="table table-striped">
        <!-- Table Header -->
        <thead>
            <tr>
                <th>O.N.</th>
                <th>Customer</th>
                <th>Contact</th>
                <th>OrderDate</th>
                <th>Payment Method</th>
                <th>Order Status</th>
                <th>More Details</th>
            </tr>
        </thead>
        <!-- Table Body with PHP Code -->
        <?php
        include_once "../config/dbconnect.php";
        require "../config/function.php";
        
        // Escape and validate the input parameters
        if(isset($_GET['order_date']) && $_GET['order_date'] != '' && isset($_GET['order_status']) && $_GET['order_status'] != ''){
            $order_date = validate($_GET['order_date']);
            $order_status = validate($_GET['order_status']);

            if ($order_status = 'Pending'){
              $order_status_db = 0;
            }elseif($order_status = 'Delivered'){
              $order_status_db = 1;
            }
            $sql = "SELECT *
            FROM orders
            JOIN users ON users.user_id = orders.user_id
            WHERE order_date = '$order_date' AND order_status = '$order_status_db'
            ORDER BY order_id;";
        }else{
            $sql = "SELECT *
            FROM orders
            JOIN users ON users.user_id = orders.user_id";
        }
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Displaying order data in table rows
                ?>
                <tr>
                    <!-- Order Details -->
                    <td><?= $row["order_id"] ?></td>
                    <td><?= $row["first_name"] ?> <?= $row["last_name"] ?></td>
                    <td><?= $row["contact_no"] ?></td>
                    <td><?= $row["order_date"] ?></td>
                    <td><?= $row["payment_method"] ?></td>
                    <?php
                    // Displaying order status buttons
                    if ($row["order_status"] == 'Canceled') {
                        echo '<td><button class="btn btn-danger" onclick="ChangeOrderStatus(\'' . $row['order_id'] . '\')">Canceled</button></td>';
                    } elseif($row["order_status"] == 'Confirmed' ) {
                        echo '<td><button class="btn btn-primary" onclick="ChangeOrderStatus(\'' . $row['order_id'] . '\')">Confirmed</button></td>';
                    }elseif($row["order_status"] == 'Delivered' ) {
                      echo '<td><button class="btn btn-success" onclick="ChangeOrderStatus(\'' . $row['order_id'] . '\')">Delivered</button></td>';
                  }
                    ?>
                    <!-- View Order Details Button -->
                    <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?= $row['order_id'] ?>" href="javascript:void(0);">View</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>
<script data-href="../assets/js/ajaxWork.js">
</script>
