<?php
// Add FIle
// include common file
 $this->load->view('admin/include/common.php'); 
// include header file
  $this->load->view('admin/include/header.php'); 
// include sidebar file  
   $this->load->view('admin/include/sidebar.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Producto
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Producto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Lista</h3>
                <a href="<?php echo base_url().'index.php/product/create'; ?>" class="btn btn-primary btn-sm pull-right">Crear nuevo</a>
        				
              </div>
              <!-- /.box-header -->
              <div class="box-body">
              <?php if($this->session->flashdata('msg') != false){ ?>
                 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php } ?>
              <?php 
                $attributes = array('id' => 'frm','name'=>'frm');
                echo form_open('product/delete',$attributes) ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
   										<th align="left" >Nombre Categoría</th>
   										<th align="left" >Nombre Producto</th>
   										<th align="left" >Serie Producto</th>
   										<th align="left" >Imagen Producto</th>
   										<th align="left" >Activo</th>
   										<th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
					  $arids = array();
                      foreach ( $recored as $_recored ) {
                        $arids[] = $_recored->product_id;
                  ?>
                            <tr>
       												<td>
                                  <?php 
                                    $CI =& get_instance();
                                    echo $CI->get_category_name($_recored->sub_category_id);
                                  ?>
                              </td>
                              <td><?php echo $_recored->product_name; ?></td>
       												<td><?php echo $_recored->product_serial_no; ?></td>
       												<td>
                                <img src="<?php echo base_url().'file/product/'.$_recored->product_image_1; ?>" height="80" width="80" />
                              </td>
       												<td>
                                <label class="switch">
                                  <input type="checkbox" <?php $is_act = 'yes'; if($_recored->product_is_active == 'yes') { echo 'checked'; $is_act = 'no'; }?> onchange="javascript:window.location.href='<?php echo base_url().'index.php/product/change_action/'.$_recored->product_id.'/'.$is_act; ?>'">
                                  <span class="slider round"></span>
                                </label>
                              </td>
                             
							                <td>
                                <a class="action-edit btn btn-info btn-sm" href="<?php echo base_url().'index.php/product/edit/'.$_recored->product_id; ?>" class="action-edit" title="Edit"><i class="fa fa-edit"></i></a>
                                <a class="action-edit btn btn-danger btn-sm" href="<?php echo base_url().'index.php/product/delete/'.$_recored->product_id; ?>" class="action-edit" title="Delete"><i class="fa fa-close"></i></a>
                              </td>
							 
                            </tr>
                  <?php 
                     }
                  ?>
                    </tbody>
                  
                </table>
                <input type="hidden" name="hdnmode" id="hdnmode" value="" />
                <input type="hidden" name="hdnids" id="hdnids" value="<?php echo implode(',',$arids); ?>" />
              <?php echo form_close() ?>
              </div>
            </div>
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php // include footer FIle

 $this->load->view('admin/include/footer.php'); ?>			

