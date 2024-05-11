<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Joining Date</th>
        <th class="text-center" colspan="3">Address</th>
        <th class="text-center" colspan="3">Action</th>
        <th class="text-center">status</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from users where user_type=0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["first_name"]?> <?=$row["last_name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["contact_no"]?></td>
      <td><?=$row["registered_at"]?></td>
      <td><?=$row["user_address"]?></td>
      <td><?=$row["district"]?></td>
      <td><?=$row["city"]?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="CustomerEditForm('<?=$row['user_id']?>')">Edit</button></td>
      <td><button class="btn btn-success" style="height:40px" onclick="updateUserStatus('enable', <?= $row['user_id'] ?>)">Enable</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="updateUserStatus('disable', <?= $row['user_id'] ?>)">Disable</button></td>
      <td><?=$row["status"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
</div>
<script>

    function updateUserStatus(action, user_id) {
        $.get("adminView/updateUserStatus.php", {
            action: action,
            user_id: user_id
        }, function(response) {
            if (response.success) {
                alert(response.message);
                // Optionally, update the UI to reflect the updated status without page reload
            } else {
                alert("Error: " + response.message);
            }
        }, "json");}

</script>