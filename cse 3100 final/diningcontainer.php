<!DOCTYPE html>
<html>
    <body>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'sweet home');
$select1 = mysqli_query($connection, "SELECT * FROM dining_product");
$cnt = 0;
while ($cnt < 3 && $row = mysqli_fetch_assoc($select1)) {
    $cnt = $cnt + 1; ?>
    <div class="product1">
        <img src="images/<?php echo $row['image']; ?>" height="100" alt="abc">
        <div class="description">
            <p><?php echo $row['name']; ?></p>
            <p><?php echo "$" . $row['price']; ?></p>
            <a style="margin-top:0px;  display: block;width: 220px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 30px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 4px;" href="masterbed.php?addtocartbed=<?php echo $row['id']; ?>">add to cart</a>
        </div>
    </div>
<?php } ?>
</body>
</html>