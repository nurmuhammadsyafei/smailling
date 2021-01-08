<script>
// Give $ back to prototype.js; create new alias to jQuery.
var $jq = jQuery.noConflict();
</script>
<script>
$(document).ready(function(){
        $(".tbl_edit").click(function(){
            var nnp=$("#npp").val();
            // var month=$("#month").val();
            // var year=$("#year").val();
            var page= <?php $this->load->view('administrator/grup/edit') ?>;
            // var x=page+"?id="+nnp +"&month="+month+"&year="+year;
            var x=page;
            $("#kupret").load(page);
        }
    );
});
</script>

<!-- STAR MODAL NEW -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('administrator/grup/add') ?>" method="POST">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Grup</h4>
            </div>
            <div class="modal-body">
                <div class="row"><div class="col-md-12"><i>Nama Grup</i>
                    <input type="text"name="_nama"class="form-control">
                </div></div>
                <div class="row"><div class="col-md-12"><i>Deskripsi</i>
                    <input type="text"name="_desc"class="form-control">
                </div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- END MODAL NEW -->

<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Auth User</h3>
                    </div>
                    <div class="col-md-6" id="mydiv">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="row">
                <div class="col-md-5  col-sm-9">

                </div>
                <div class="col-md-2  col-sm-9">
                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-default">
                New Grup
              </button>
                        <!-- <a href="<?= base_url('administrator/menu/add')?>" class=></a> -->
                        <!-- <button type="button" class="btn btn-warning">Right</button> -->
                        <!-- <button type="button" class="btn btn-success">Right</button> -->
                </div>
                <div class="col-md-12 col-sm-9">
                        <table id="" class="example2 table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi Grup</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($grup as $a ){?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['nama_grup']?></td>
                                    <td><?= $a['desc_grup']?></td>
                                    <td>
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-info tbl_edit" data-toggle="modal" data-target="#modal-info<?= $a['id_grup']?>"><i class="fa fa-edit"></i></button> -->
                                        <button type="button" class="btn btn-danger tbl_edit">Coba</button>
                                        <!-- <button type="button" class="btn btn-danger"></button> -->
                                        <a href="#"class="btn btn-danger" onclick="return confirm('Hapus Akun Ini ?');"><i class="fa fa-close"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <!-- MODAL -->
                               
                                <!-- END MODAL -->
                            <?php } ?> 
                            </tbody>
                            
                        </table>
                         

                    <div id="kupret"></div>
                <div class="col-md-3 col-sm-4">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
setTimeout(function() {
    $('#mydiv').fadeOut(5000);
}, 3000); 
</script>
