<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card" style="box-shadow: 0 0 25px 0 lightgrey">
                <div class="card-header">
                    New Orders
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" align="right">Order Date</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control form-control-sm"
                                       value="<?php echo date('Y-m-d');?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" align="right">Customer Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="cus_name" class="form-control form-control-sm"
                                       placeholder="Enter Customer Name" required>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body" style="box-shadow: 0 0 25px 0 lightgrey">
                                <h3>Make a Order List</h3>
                                <table align="center" style="width:800px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align: center;">Item Name</th>
                                        <th style="text-align: center;">Total Quantity</th>
                                        <th style="text-align: center;">Qunatity</th>
                                        <th style="text-align: center;">Price</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="invoice-item">
                                       <tr>
                                           <td><b id="number">1</b></td>
                                           <td>
                                               <select name="item" class="form-control form-control-sm">
                                                   <option>select item</option>
                                                   <option>Washing Machine</option>
                                               </select>
                                           </td>
                                           <td><input type="text" readonly class="form-control form-control-sm" name="tquan"></td>
                                           <td><input type="text" class="form-control form-control-sm" name="quan" required></td>
                                           <td><input type="text" readonly class="form-control form-control-sm" name="price"></td>
                                           <td>Rs.966</td>
                                       </tr>
                                    </tbody>
                                </table>

                                <center style="padding:10px">
                                    <input type="submit" id="add" style="width:150px" class="btn btn-success" value="Add">
                                    <input type="submit" id="remove" style="width:150px" class="btn btn-danger" value="Remove">
                                </center>
                            </div>
                        </div>
                        <p></p>
                        <div class="form-group row">
                            <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub_Total</label>
                            <div class="col-sm-6">
                                <input type="text" name="subtotal" class="form-control form-control-sm" id="sub_total" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
                            <div class="col-sm-6">
                                <input type="text" name="discount" class="form-control form-control-sm" id="discount" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="net_total" class="col-sm-3 col-form-label" align="right">Net_Total</label>
                            <div class="col-sm-6">
                                <input type="text" name="nettotal" class="form-control form-control-sm" id="nettotal" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                            <div class="col-sm-6">
                                <input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paid" class="col-sm-3 col-form-label" align="right">Due</label>
                            <div class="col-sm-6">
                                <input type="text" name="due" class="form-control form-control-sm" id="due" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Type</label>
                            <div class="col-sm-6">
                                <select name="payment_type" class="form-control form-control-sm" id="paymenttype" required>
                                    <option>Cash</option>
                                    <option>Card</option>
                                    <option>Draft</option>
                                    <option>Cheque</option>
                                </select>
                            </div>
                        </div>
                        <center style="padding:10px">
                            <input type="submit" id="order" style="width:150px" class="btn btn-info" value="Order">
                            <input type="submit" id="print_invoice" style="width:150px" class="btn btn-danger d-none" value="Print Invoice">
                        </center>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"--}}
        {{--integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
        {{--crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<![endif]-->

<script>
    $(document).ready(function () {

        $('#add').click(function(){
           addnewrow();
        })

        function addnewrow(){
            $.ajax({
                url:'{{route('getnewRow')}}',
                type:'get',
                datatype:'json',

                success:function(data){
                    //console.log(data);
                    $('#invoice-item').append()
                }

            });
        }

    })
</script>
</body>
</html>







