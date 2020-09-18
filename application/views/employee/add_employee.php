<link href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

<section>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4>Add Employee</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(!empty($this->session->flashdata('success'))){ ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?= $this->session->flashdata('success') ?>
                </div>
            <?php } ?>

            <?php if(!empty($this->session->flashdata('error'))){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> <?= $this->session->flashdata('error') ?>
                </div>
            <?php } ?>
            <form id="addEmpForm" action="<?= base_url('employee/addEmp') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="emp_name">Employee Name</label>
                    <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter name" required="">
                </div>
                <div class="form-group">
                    <label for="emp_address">Employee address</label>
                    <input type="text" class="form-control" id="emp_address" name="emp_address" placeholder="Enter address" required="">
                </div>
                <div class="form-group">
                    <label for="emp_email">Email address</label>
                    <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter email" required="">
                </div>
                <div class="form-group">
                    <label for="emp_phone">Employee Phone</label>
                    <input type="number" class="form-control" id="emp_phone" name="emp_phone" placeholder="Enter Phone number" required="">
                </div>
                <div class="form-group">
                    <label for="emp_dob">Employee DOB</label>
                    <input type="text" class="form-control" id="emp_dob" name="emp_dob" placeholder="Enter DOB" required="" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="emp_image">Employee Image</label>
                    <input type="file" class="form-control" id="emp_image" name="emp_image" size="33"  accept=".jpg,.png" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button> 
                <a href="<?= base_url('employee/listEmp') ?>">List Employee</a>
            </form>
        </div>
    </div>
    
</section>

<script src="<?= base_url() ?>assets/jQueryValidation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
        if($("#addEmpForm").length > 0){
            var addEmpForm = $("#addEmpForm");
            var validator = addEmpForm.validate({
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
        }
        
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