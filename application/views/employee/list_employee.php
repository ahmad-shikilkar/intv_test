<link href="<?= base_url() ?>assets/dataTables/datatables.min.css" rel="stylesheet">

<section class="mt-5">
    <div class="row">
        <div class="col-md-6">
            <h4>List Employee</h4>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url() ?>" class="btn btn-primary">Add Employee</a>
        </div>
    </div>
    
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
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
            <table class="table" id="listEmp">
                <thead>
                <tr>
                    <th>Emp id</th>
                    <th>Emp Name</th>
                    <th>Emp address</th>
                    <th>Emp mail</th>
                    <th>Emp Phone</th>
                    <th>Emp DOB</th>
                    <th>Emp Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($emp_list) && !empty($emp_list)){ 
                    foreach($emp_list as $emp){
                        //print_r($emp);
                    ?>
                    <tr>
                        <td><?= $emp['emp_id'] ?></td>
                        <td><?= $emp['emp_name'] ?></td>
                        <td><?= $emp['address'] ?></td>
                        <td><?= $emp['emp_mail'] ?></td>
                        <td><?= $emp['phone'] ?></td>
                        <td><?= $emp['dob'] ?></td>
                        <td><img src="<?= IMAGE_UPLOAD_URL.$emp['emp_image'] ?>" width="60" height="60" alt="image"></td>
                        <td><a href="<?= base_url('employee/edit/'.$emp['emp_id']) ?>">Edit</a> | <a href="<?= base_url('employee/delete/'.$emp['emp_id']) ?>">Delete</a></td>
                    </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
    
</section>

<script src="<?= base_url() ?>assets/dataTables/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/dataTables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function(){
        $('#listEmp').DataTable({
            pageLength: 10,
            responsive: true
        });
    });
</script>