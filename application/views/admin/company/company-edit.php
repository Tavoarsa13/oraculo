<?php
// Add FIle
// include common file
 $this->load->view('admin/include/common.php'); 
// include header file
  $this->load->view('admin/include/header.php'); 
// include sidebar file  
   $this->load->view('admin/include/sidebar.php');

$this->load->view('admin/include/getCanton.php');

require('conexion.php');
$query="SELECT idProvincia,nombreProvincia FROM `codificacion_mh` WHERE idProvincia <=7 GROUP by nombreProvincia";
$resultado=$mysqli->query($query);

   
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Compañia
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Compañia</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            
                <?php if($this->session->flashdata('msg') != false){ ?>
                 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Alerta!</h4>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php } ?>
                <?php if(validation_errors() != false){ ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                      <?php echo validation_errors(); ?>
                  </div>
                <?php } ?>
              <?php 
                $attributes = array('id' => 'frm','name'=>'frm');
                  echo form_open_multipart('company/update/1',$attributes); ?>
              
                <div class="box box-primary">
                  <div class="col-md-6" style="background: #ffffff;">
                
                          <div class='box-body pad'>
                                    <div class="form-group">
                                        <label>Nombre :</label>
                                        <input type="text" name="txtfirst_name" class="form-control " placeholder="Enter First Name..." value="<?php echo htmlspecialchars($objcompany['company_name']); ?>" />
                                    </div>
                                  
                                    <div class="form-group">
                                        <label>Tipo de Identificación :</label>
                                        <select name="type_identf">
                                          <option value="01">Fisico</option>
                                          <option value="02">Juridico</option>                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Número de Identificación:</label>
                                        <input type="number" name="txtemisor_num_identif" class="form-control " placeholder="Ingrese el nombre Comercial" value="<?php echo htmlspecialchars($objcompany['company_emisor_num_identif']); ?>" />
                                    </div>                                      
                                    <div class="form-group">
                                        <label>Codigo País tel:</label>
                                        <input type="number" name="txt_codigo_tel" class="form-control " placeholder="Ingrese Codigo de pais..." value="<?php echo htmlspecialchars($objcompany['company_pais_tel']); ?>" />
                                    </div>
                                    
                                    <div class="form-group">
                                      <label>Número de telefono. :</label><br />
                                      <input type="text" class="form-control" name="txtcustomer_phone" value="<?php echo htmlspecialchars($objcompany['company_phone']); ?>" placeholder="Ingrese numero de telefono" />
                                    </div>
                                     <div class="form-group">
                                        <label>Codigo País fax:</label>
                                        <input type="number" name="txt_codigo_fax" class="form-control " placeholder="Ingrese Codigo de Fax..." value="<?php echo htmlspecialchars($objcompany['company_codigo_pais_fax']); ?>" />
                                    </div>
                                    
                                    <div class="form-group">
                                      <label>Número de fax. :</label><br />
                                      <input type="text" class="form-control" name="txtcustomer_fax" value="<?php echo htmlspecialchars($objcompany['company_fax']); ?>" placeholder="Ingrese número de fax" />
                                    </div>
                  
                            </div>
                    </div>
                            
              <div class="col-md-6" style="background: #ffffff;">
                <div class='box-body pad'>
                    <div class="form-group">
                      <label>Nombre Comercial :</label>
                      <input type="text" name="txtnombre_comercial" class="form-control " placeholder="Ingrese el nombre Comercial" value="<?php echo htmlspecialchars($objcompany['company_nombre_comercial']); ?>" />
                    </div>

                  <div class="form-group">
                    <label>Email :</label>
                    <input type="email" class="form-control" name="txtemail" placeholder="Ingrese el Email" value="<?php echo htmlspecialchars($objcompany['company_email']); ?>" />
                  </div>
                
                  <div class="form-group">

                
                    <label>Provincia:</label>
                        <select id="cbx_provincia" name="cbx_provincia" >
                          <option value="0">Seleccionar Provincia</option>                              
                                             
                        </select>
                  
                                   
                      <label>Cantón :</label>
                        <select id="cbx_canton" name="cbx_canton" >
                         <option value="0">Seleccionar Canton</option> 

                        </select>
                    
                      <label>Distrito :</label>
                       <select id="distritos" name="txt_canton" >
                            
                       

                      </select>


                   
                   
                  </div>
                  <div class="form-group">
                     <label>Barrio :</label>
                     <input type="text" class="form-control" name="txtbarrio" value="<?php echo htmlspecialchars($objcompany['company_barrio']); ?>" />                    
                  </div>
                   <div class="form-group">
                     <label>Otras Señas :</label>
                     <input type="text" class="form-control" name="txtsennas" value="<?php echo htmlspecialchars($objcompany['company_sennas']); ?>" />                    
                  </div>
                  
                                    
                  <div class="col-md-8">  
                      <div class="form-group">
                          <label>Logo:</label><br />
                          <input type="file"  name="fl_clogo" />
                          <br />
                          <?php
                           $image = 'file/company/'.$objcompany['company_image'];
                           if (file_exists($image)) {
                                   echo '<input type="checkbox" name="chkdelete_logo" value="yes"  /> <label> Eliminar Logo</label><br />';
                                   ?>
                                   <input type="checkbox" <?php if($objcompany['recipe_print'] == 'yes') echo 'checked="checked"'; ?>   name="chkprint_logo" value="yes"  /> <label> Imprimir logo en la Factura</label>
                                  <?php
                               }
                          ?>
                      </div>
                  </div>
                
                  <?php 
                                        if ( file_exists($image) ) {
                                            echo '<div class="col-md-4"><img src="'.base_url().$image.'" width="150" height="150" alt="Logo Compañia" /></div>';
                                        }
                                    ?>
                  
                                    
                  </div>
              </div>
            </div><!-- /.box -->
        </div><!-- /.col-->
      </div>

      <br />
      
      <div class="row">  
        <div class='col-md-12'>
                    <div class='box box-danger' >
                        <div class='box-header'>
                            <h3 class='box-title'><i class="fa fa-money" aria-hidden="true"></i>
Impuestos & Monedas</h3>
                        </div><!-- /.box-header -->
                        
                            <div class="col-md-6" style="background: #ffffff;">
                
                                 

                          <div class='box-body pad'>
                                   <div class="form-group">
                                        <label>GST NO :</label>
                                        <input type="text" name="txtgst_no" class="form-control " placeholder="Enter Gst Number..." value="<?php echo htmlspecialchars($objcompany['company_gst_no']); ?>" />
                                    </div>


                                   <div class="form-group">
                                        <label>TAX NO :</label>
                                        <input type="text" name="txtvat_no" class="form-control " placeholder="Enter Vat Number..." value="<?php echo htmlspecialchars($objcompany['company_vat_no']); ?>" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Other TAX NO :</label>
                                        <input type="text" name="txtcst_no" class="form-control " placeholder="Enter Cst Number..." value="<?php echo htmlspecialchars($objcompany['company_cst_no']); ?>" />
                                    </div>
                                    
                                     
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                            
                            <div class="col-md-6" style="background: #ffffff;">
                <div class='box-body pad'>
                                    
                                    <div class="form-group">
                                        <label>Impuesto de Ventas(%):</label>
                                        <input type="text" name="txtsales_tax3" class="form-control " placeholder="Enter Sales Tax Value..." value="<?php echo htmlspecialchars($objcompany['sales_tax3']); ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Servicio Resurante (%):</label>
                                        <input type="text" name="txtsales_tax1" class="form-control " placeholder="Enter Sales Tax Value..." value="<?php echo htmlspecialchars($objcompany['sales_tax1']); ?>" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Impuesto 3 (%):</label>
                                        <input type="text" name="txtsales_tax2" class="form-control " placeholder="Enter Sales Tax Value..." value="<?php echo htmlspecialchars($objcompany['sales_tax2']); ?>" />
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                    </div><!-- /.box -->
        </div><!-- /.col-->
      </div>  
       <br/> 
      <div class="row">  
         <div class='col-md-12'>
          <div class='box box-success' >
                      <div class='box-header'>
                            <h3 class='box-title'>Total de mesas que desee!!</h3>
                        </div><!-- /.box-header -->
            <div class='box-body pad'>
              
                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Mesas</label>
                                        <input type="text" name="txttable" class="form-control " placeholder="Ingrese el numero de mesas.." value="<?php echo htmlspecialchars($objcompany['total_table']); ?>" />
                                    </div>
                </div>
                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Mesas Parcelas</label>
                                        <input type="text" name="txtparcel" class="form-control " placeholder="ngrese el numero de Parcelas..." value="<?php echo htmlspecialchars($objcompany['total_parcel']); ?>" />
                                    </div>
                </div>
                
            </div>
          </div>
        </div>
      </div>
      <div class="row">
                <div class='col-md-12'>
          <div class='box box-warning' >
                      <div class='box-header'>
                            <h3 class='box-title'>Terminos & Politicas</h3>
                        </div><!-- /.box-header -->
            <div class='box-body pad'>
              
                <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Políticas</label>
                                        <input type="text" name="txtterms" class="form-control " placeholder="Enter Terms..." value="<?php echo htmlspecialchars($objcompany['company_terms']); ?>" />
                                    </div>
                </div>
                
            </div>
          </div>
        </div>
      </div>
      <div class="row">

        <div class='col-md-12'>
          <div class='box box-warning' >
                      <div class='box-header'>
                            <h3 class='box-title'>SMS </h3>
                        </div><!-- /.box-header -->
            <div class='box-body pad'>
            <div class="col-md-6">
              
                <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Enviar mensaje ?</label>
                                        <input type="checkbox" name="chksms"   value="yes"  <?php if($objcompany['sms'] == 'yes') echo 'checked="checkd"'; ?>/>
                                    </div>
                </div>
                
            </div>
            
            <div class="col-md-6">
              
                <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Message API</label>
                                        <input type="text" name="txtsmsapi" class="form-control "  value="<?php echo htmlspecialchars($objcompany['sms_api']); ?>" />
                                    </div>
                </div>
                
            </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">          
        <div class='col-md-12'>
          <div class='box box-primary' >
            <div class='box-body pad'>
              
                
                <div class="col-md-6 " style="background: #ffffff;">
                  <label>Guardar!!! </label>
                </div>
                <div class="col-md-6 text-right">
                
                  <div class="form-group">
                    <input type="submit" name="btnsubmit" class="btn btn-primary" value="Save"/>
                  </div>
                  
                  <script type="text/javascript" language="javascript">
                    document.getElementById('txtfirst_name').focus();
                  </script>
                </div>
            </div>
          </div>
        </div>
      </div>
      

      <div class="row">  
				<div class='col-md-12'>
          <div class='box box-danger' >
            <div class='box-body pad'>
              
                
                <div class="col-md-6 " style="background: #ffffff;">
                    <label>Generar Respaldo de Base  de Datos !!!</label>
                </div>
                <div class="col-md-6 text-right">
                  <div class="form-group">
                    <button type="button" onclick="backupg();" id="babcd" class="btn btn-danger">Generar Respaldo</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
        <style>
 .loading-image {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 10;
}
.loader
{
    display: none;
    width:200px;
    height: 200px;
    position: fixed;
    top: 40%;
    left: 50%;
    text-align:center;
    margin-left: -50px;
    margin-top: -100px;
    z-index:99999;
    overflow: auto;
  
}
 </style>
        <div class="loader">
           <center>
             <img class="loading-image" src="images/ajax-loader1.gif" alt="loading..">
           </center>
        </div>
                   
              <?php echo form_close(); ?>


              
           
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php // include footer FIle 
 
 $this->load->view('admin/include/footer.php'); ?>			

<script type="text/javascript">

$(document).ready(function(){

  $("#cbx_provincia").change(function(){

    //$('#cbx_canton').find('option').remove().end().append(
     // '<option value="whatever"></option>').val('whatever');

    $("#cbx_provincia option:selected").each(function(){

      idProvincia=$(this).val();

      $post("include/getCantonk.php",{idProvincia:id_provincia
        },function(data){
          $("#cbx_canton").html(data);
      });
    });
      
  })
 });



 

</script>

