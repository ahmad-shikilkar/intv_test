<link href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

<section>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4>Update Employee</h4>
        </div>
    </div>
    <?php
    //echo "<pre>";
    //print_r($emp_data);
    //echo "</pre>";
    ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="updateEmpForm" action="<?= base_url('employee/updateEmp') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="emp_id" id="emp_id" value="<?= $emp_data[0]['emp_id'] ?>">
                <div class="form-group">
                    <label for="emp_name">Employee Name</label>
                    <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter name" value="<?= $emp_data[0]['emp_name'] ?>" required="">
                </div>
                <div class="form-group">
                    <label for="emp_address">Employee address</label>
                    <input type="text" class="form-control" id="emp_address" name="emp_address" placeholder="Enter address" value="<?= $emp_data[0]['address'] ?>" required="">
                </div>
                <div class="form-group">
                    <label for="emp_email">Email address</label>
                    <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter email" value="<?= $emp_data[0]['emp_mail'] ?>" required="">
                </div>
                <div class="form-group">
                    <label for="emp_phone">Employee Phone</label>
                    <input type="number" class="form-control" id="emp_phone" name="emp_phone" placeholder="Enter Phone number" value="<?= $emp_data[0]['phone'] ?>" required="">
                </div>
                <div class="form-group">
                    <label for="emp_dob">Employee DOB</label>
                    <input type="text" class="form-control" id="emp_dob" name="emp_dob" placeholder="Enter DOB" value="<?= $emp_data[0]['dob'] ?>" required="">
                </div>
                <div class="form-group">
                    <label for="emp_image">Employee Image</label>
                    <input type="file" class="form-control" id="emp_image" name="emp_image" size="33"  accept=".jpg,.png" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('employee/listEmp') ?>">List Employee</a>
            </form>
        </div>
    </div>
    
</section>

<script src="<?= base_url() ?>assets/jQueryValidation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
        var updateEmpForm = $("#updateEmpForm");
        var validator = updateEmpForm.validate({
            rules:{
                emp_name    :   { required : true },
                emp_address    :   { required : true },
                emp_email    :   { required : true, email : true },
                emp_phone    :   { required : true, number : true },
                emp_dob    :   { required : true }
            },
            messages:{
                emp_name    :   { required : 'This is required' },
                emp_address    :   { required : 'This is required' },
                emp_email    :   { required : 'This is required', email : 'Enter valid email' },
                emp_phone    :   { required : 'This is required', number : 'Enter number only' },
                emp_dob    :   { required : 'This is required' }
            },
            submitHandler : function(form){
                form.submit();
            }
        });
        
        if($("#emp_dob").length > 0){
            $('#emp_dob').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                //format: "dd/mm/yyyy",
                format: "yyyy-mm-dd",
                //startDate: new Date()
                endDate: new Date()
            }).on('changeDate',function(event){
                //var d = new Date(event.date);
                $(this).focus();
                //var curr_date = d.getDate();
                //var curr_month = d.getMonth() + 1; //Months are zero based
                //var curr_year = d.getFullYear();
            });
        }
    });

</script>