<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
    integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:30px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<div id="content2" style="background: #fff;height:1000px;border-bottom: 1px solid #ffffff;margin-top:50px;margin-bottom:50px;">
    <div class="tokenDet"
        style="padding: 15px;border: 1px solid #000;width: 80%;margin: 0 auto;position: relative;overflow: hidden;">
        <div class="title" style="text-align: center; color: green; border-bottom: 1px solid #000;margin-bottom: 15px;">
            <h2>Art World Invoice</h2>
        </div>
        <div class="parentdiv" style="display: inline-block;width: 100%;position: relative;">
            <div class="innerdiv" style="width: 80%;float: left;">
                <div class="restDet">
                    <div class="div">
                    <?php
                                            include '../connection.php';
                                            session_start();
                                            $loginid=$_SESSION["loginid"];
                                                $id=$_GET['id'];
                                                $sql0 = "SELECT * FROM orders where id =$id" ;
                                                $result0 = mysqli_query($con,$sql0);
                                                $order=$result0->fetch_assoc();
                                        ?>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Customer Name</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['first_name'].' '.$order['last_name']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Email</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['email']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Phone</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['phone']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Country</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['country']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>State</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['state']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Address 1</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['address_1']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Address 2</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['address_2']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Pincode</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['pincode']; ?></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Total Amount</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><b>Rs.<?php echo $order['total_amount']; ?></b></span>
                        </div>
                        <div class="label" style="width: 30%;float: left;">
                            <strong>Order Date</strong>
                        </div>
                        <div class="data" style="width: 70%;display: inline-block;">
                            <span><?php echo $order['order_date']; ?></span>
                        </div>
                    </div>
                </div>
                <center><h2>Product Details</h2></center>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Amount</th>
                    </tr>
                    <?php
                    $sql0 = "SELECT * FROM cart where order_id =$id" ;
                    $result0 = mysqli_query($con,$sql0);
                    $i=1;
                    while($row=$result0->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    // $('#downloadPDF').click(function () {
    domtoimage.toPng(document.getElementById('content2'))
        .then(function (blob) {
            var pdf = new jsPDF('l', 'pt', [$('#content2').width(), $('#content2').height()]);

            pdf.addImage(blob, 'PNG', 0, 0, $('#content2').width(), $('#content2').height());
            var data=pdf.save("invoice.pdf");
            window.location.href="orders.php";
            that.options.api.optionsChanged();
            
        });
    // 
// });
</script>