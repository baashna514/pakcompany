
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Shipping Management</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="" style="margin-bottom: 20px;">
                            <?php echo $__env->make('admin.layout.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div id="City" class="tabcontent" style="display: block;">
                        <div class="row clearfix">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Shipment Management
                                            <small>Add New Charges</small>
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <form action="<?php echo e(route('shipment.shipping-charges')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <label for="condition">Condition:</label>
                                                    <select name="condition" class="form-control" required>
                                                        <option value="weight">Weight (KG)</option>
                                                        <option value="price">Total Price (Rs)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label for="min">Min Value:</label>
                                                            <input type="text" name="min" class="form-control" placeholder="Enter minimum value"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label for="max">Max Value:</label>
                                                            <input type="text" name="max" class="form-control" placeholder="Enter maximum value"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label for="rate">Shipping Rate:</label>
                                                            <input type="text" name="rate" class="form-control" placeholder="Enter shipping rate"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Shipment Management
                                            <small>Shipping Charges</small>
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        
                                                        
                                                        <th>Condition</th>
                                                        <th>Min Value</th>
                                                        <th>Max Value</th>
                                                        <th>Shipping Rate</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        
                                                        
                                                        <th>Condition</th>
                                                        <th>Min Value</th>
                                                        <th>Max Value</th>
                                                        <th>Shipping Rate</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php if($rates): ?>
                                                    <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                    <tr>
                                                        
                                                        
                                                        <td><?php echo e($shipping->condition); ?></td>
                                                        <td><?php echo e($shipping->min); ?></td>
                                                        <td><?php echo e($shipping->max); ?></td>
                                                        <td><?php echo e($shipping->rate); ?></td>
                                                        <td>
                                                            <a data-id="<?php echo e($shipping->id); ?>" href="#" class="btn btn-primary editCity"><i  class="material-icons" data-toggle="modal"   data-target="#cityModal">edit</i></a> 
                                                            <a href="<?php echo e(route('ds.shipping.delCity',$shipping->id)); ?>" class="btn btn-primary"><i class="material-icons">delete</i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    <tr>
                                                        No Data Found
                                                    </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Modal -->
            <div class="modal fade" id="cityModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit City</h4>
                        </div>
                        <div class="modal-body">
                            <form id="edit" action="<?php echo e(route('ds.shipping.editCity')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" id="editCityId" name="id">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="attribute">Name</label>
                                                <select name="name" id="name" class="form-control" required>
                                                <option value="" disabled selected>Select The City</option>
                                                <option value="Islamabad">Islamabad</option>
                                                <option value="" disabled>Punjab Cities</option>
                                                <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                                <option value="Dadiyal (A.K)">Dadiyal (A.K)</option>
                                                <option value="Ahmadpur East">Ahmadpur East</option>
                                                <option value="Ali Khan Abad">Ali Khan Abad</option>
                                                <option value="Alipur">Alipur</option>
                                                <option value="Arifwala">Arifwala</option>
                                                <option value="Attock">Attock</option>
                                                <option value="Bhera">Bhera</option>
                                                <option value="Bhalwal">Bhalwal</option>
                                                <option value="Bahawalnagar">Bahawalnagar</option>
                                                <option value="Bahawalpur">Bahawalpur</option>
                                                <option value="Bhakkar">Bhakkar</option>
                                                <option value="Burewala">Burewala</option>
                                                <option value="Chillianwala">Chillianwala</option>
                                                <option value="Chakwal">Chakwal</option>
                                                <option value="Chichawatni">Chichawatni</option>
                                                <option value="Chiniot">Chiniot</option>
                                                <option value="Chishtian">Chishtian</option>
                                                <option value="Daska">Daska</option>
                                                <option value="Darya Khan">Darya Khan</option>
                                                <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                                <option value="Dhaular">Dhaular</option>
                                                <option value="Dina">Dina</option>
                                                <option value="Dinga">Dinga</option>
                                                <option value="Dipalpur">Dipalpur</option>
                                                <option value="Faisalabad">Faisalabad</option>
                                                <option value="Ferozewala">Ferozewala</option>
                                                <option value="Fateh Jhang">Fateh Jang</option>
                                                <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                                <option value="Gojra">Gojra</option>
                                                <option value="Gujranwala">Gujranwala</option>
                                                <option value="Gujrat">Gujrat</option>
                                                <option value="Gujar Khan">Gujar Khan</option>
                                                <option value="Hafizabad">Hafizabad</option>
                                                <option value="Haroonabad">Haroonabad</option>
                                                <option value="Hasilpur">Hasilpur</option>
                                                <option value="Haveli Lakha">Haveli Lakha</option>
                                                <option value="Jatoi">Jatoi</option>
                                                <option value="Jalalpur">Jalalpur</option>
                                                <option value="Jattan">Jattan</option>
                                                <option value="Jampur">Jampur</option>
                                                <option value="Jaranwala">Jaranwala</option>
                                                <option value="Jhang">Jhang</option>
                                                <option value="Jhelum">Jhelum</option>
                                                <option value="Kalabagh">Kalabagh</option>
                                                <option value="Karor Lal Esan">Karor Lal Esan</option>
                                                <option value="Kasur">Kasur</option>
                                                <option value="Kamalia">Kamalia</option>
                                                <option value="Kamoke">Kamoke</option>
                                                <option value="Khanewal">Khanewal</option>
                                                <option value="Khanpur">Khanpur</option>
                                                <option value="Kharian">Kharian</option>
                                                <option value="Khushab">Khushab</option>
                                                <option value="Kot Addu">Kot Addu</option>
                                                <option value="Jauharabad">Jauharabad</option>
                                                <option value="Lahore">Lahore</option>
                                                <option value="Lalamusa">Lalamusa</option>
                                                <option value="Layyah">Layyah</option>
                                                <option value="Liaquat Pur">Liaquat Pur</option>
                                                <option value="Lodhran">Lodhran</option>
                                                <option value="Malakwal">Malakwal</option>
                                                <option value="Mamoori">Mamoori</option>
                                                <option value="Mailsi">Mailsi</option>
                                                <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                                <option value="Mian Channu">Mian Channu</option>
                                                <option value="Mianwali">Mianwali</option>
                                                <option value="Multan">Multan</option>
                                                <option value="Murree">Murree</option>
                                                <option value="Muridke">Muridke</option>
                                                <option value="Mianwali Bangla">Mianwali Bangla</option>
                                                <option value="Muzaffargarh">Muzaffargarh</option>
                                                <option value="Narowal">Narowal</option>
                                                <option value="Nankana Sahib">Nankana Sahib</option>
                                                <option value="Okara">Okara</option>
                                                <option value="Renala Khurd">Renala Khurd</option>
                                                <option value="Pakpattan">Pakpattan</option>
                                                <option value="Pattoki">Pattoki</option>
                                                <option value="Pir Mahal">Pir Mahal</option>
                                                <option value="Qaimpur">Qaimpur</option>
                                                <option value="Qila Didar Singh">Qila Didar Singh</option>
                                                <option value="Rabwah">Rabwah</option>
                                                <option value="Raiwind">Raiwind</option>
                                                <option value="Rajanpur">Rajanpur</option>
                                                <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                                <option value="Rawalpindi">Rawalpindi</option>
                                                <option value="Sadiqabad">Sadiqabad</option>
                                                <option value="Safdarabad">Safdarabad</option>
                                                <option value="Sahiwal">Sahiwal</option>
                                                <option value="Sangla Hill">Sangla Hill</option>
                                                <option value="Sarai Alamgir">Sarai Alamgir</option>
                                                <option value="Sargodha">Sargodha</option>
                                                <option value="Shakargarh">Shakargarh</option>
                                                <option value="Sheikhupura">Sheikhupura</option>
                                                <option value="Sialkot">Sialkot</option>
                                                <option value="Sohawa">Sohawa</option>
                                                <option value="Soianwala">Soianwala</option>
                                                <option value="Siranwali">Siranwali</option>
                                                <option value="Talagang">Talagang</option>
                                                <option value="Taxila">Taxila</option>
                                                <option value="Toba Tek Singh">Toba Tek Singh</option>
                                                <option value="Vehari">Vehari</option>
                                                <option value="Wah Cantonment">Wah Cantonment</option>
                                                <option value="Wazirabad">Wazirabad</option>
                                                <option value="" disabled>Sindh Cities</option>
                                                <option value="Badin">Badin</option>
                                                <option value="Bhirkan">Bhirkan</option>
                                                <option value="Rajo Khanani">Rajo Khanani</option>
                                                <option value="Chak">Chak</option>
                                                <option value="Dadu">Dadu</option>
                                                <option value="Digri">Digri</option>
                                                <option value="Diplo">Diplo</option>
                                                <option value="Dokri">Dokri</option>
                                                <option value="Ghotki">Ghotki</option>
                                                <option value="Haala">Haala</option>
                                                <option value="Hyderabad">Hyderabad</option>
                                                <option value="Islamkot">Islamkot</option>
                                                <option value="Jacobabad">Jacobabad</option>
                                                <option value="Jamshoro">Jamshoro</option>
                                                <option value="Jungshahi">Jungshahi</option>
                                                <option value="Kandhkot">Kandhkot</option>
                                                <option value="Kandiaro">Kandiaro</option>
                                                <option value="Karachi">Karachi</option>
                                                <option value="Kashmore">Kashmore</option>
                                                <option value="Keti Bandar">Keti Bandar</option>
                                                <option value="Khairpur">Khairpur</option>
                                                <option value="Kotri">Kotri</option>
                                                <option value="Larkana">Larkana</option>
                                                <option value="Matiari">Matiari</option>
                                                <option value="Mehar">Mehar</option>
                                                <option value="Mirpur Khas">Mirpur Khas</option>
                                                <option value="Mithani">Mithani</option>
                                                <option value="Mithi">Mithi</option>
                                                <option value="Mehrabpur">Mehrabpur</option>
                                                <option value="Moro">Moro</option>
                                                <option value="Nagarparkar">Nagarparkar</option>
                                                <option value="Naudero">Naudero</option>
                                                <option value="Naushahro Feroze">Naushahro Feroze</option>
                                                <option value="Naushara">Naushara</option>
                                                <option value="Nawabshah">Nawabshah</option>
                                                <option value="Nazimabad">Nazimabad</option>
                                                <option value="Qambar">Qambar</option>
                                                <option value="Qasimabad">Qasimabad</option>
                                                <option value="Ranipur">Ranipur</option>
                                                <option value="Ratodero">Ratodero</option>
                                                <option value="Rohri">Rohri</option>
                                                <option value="Sakrand">Sakrand</option>
                                                <option value="Sanghar">Sanghar</option>
                                                <option value="Shahbandar">Shahbandar</option>
                                                <option value="Shahdadkot">Shahdadkot</option>
                                                <option value="Shahdadpur">Shahdadpur</option>
                                                <option value="Shahpur Chakar">Shahpur Chakar</option>
                                                <option value="Shikarpaur">Shikarpaur</option>
                                                <option value="Sukkur">Sukkur</option>
                                                <option value="Tangwani">Tangwani</option>
                                                <option value="Tando Adam Khan">Tando Adam Khan</option>
                                                <option value="Tando Allahyar">Tando Allahyar</option>
                                                <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                                <option value="Thatta">Thatta</option>
                                                <option value="Umerkot">Umerkot</option>
                                                <option value="Warah">Warah</option>
                                                <option value="" disabled>Khyber Cities</option>
                                                <option value="Abbottabad">Abbottabad</option>
                                                <option value="Adezai">Adezai</option>
                                                <option value="Alpuri">Alpuri</option>
                                                <option value="Akora Khattak">Akora Khattak</option>
                                                <option value="Ayubia">Ayubia</option>
                                                <option value="Banda Daud Shah">Banda Daud Shah</option>
                                                <option value="Bannu">Bannu</option>
                                                <option value="Batkhela">Batkhela</option>
                                                <option value="Battagram">Battagram</option>
                                                <option value="Birote">Birote</option>
                                                <option value="Chakdara">Chakdara</option>
                                                <option value="Charsadda">Charsadda</option>
                                                <option value="Chitral">Chitral</option>
                                                <option value="Daggar">Daggar</option>
                                                <option value="Dargai">Dargai</option>
                                                <option value="Darya Khan">Darya Khan</option>
                                                <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                                <option value="Doaba">Doaba</option>
                                                <option value="Dir">Dir</option>
                                                <option value="Drosh">Drosh</option>
                                                <option value="Hangu">Hangu</option>
                                                <option value="Haripur">Haripur</option>
                                                <option value="Karak">Karak</option>
                                                <option value="Kohat">Kohat</option>
                                                <option value="Kulachi">Kulachi</option>
                                                <option value="Lakki Marwat">Lakki Marwat</option>
                                                <option value="Latamber">Latamber</option>
                                                <option value="Madyan">Madyan</option>
                                                <option value="Mansehra">Mansehra</option>
                                                <option value="Mardan">Mardan</option>
                                                <option value="Mastuj">Mastuj</option>
                                                <option value="Mingora">Mingora</option>
                                                <option value="Nowshera">Nowshera</option>
                                                <option value="Paharpur">Paharpur</option>
                                                <option value="Pabbi">Pabbi</option>
                                                <option value="Peshawar">Peshawar</option>
                                                <option value="Saidu Sharif">Saidu Sharif</option>
                                                <option value="Shorkot">Shorkot</option>
                                                <option value="Shewa Adda">Shewa Adda</option>
                                                <option value="Swabi">Swabi</option>
                                                <option value="Swat">Swat</option>
                                                <option value="Tangi">Tangi</option>
                                                <option value="Tank">Tank</option>
                                                <option value="Thall">Thall</option>
                                                <option value="Timergara">Timergara</option>
                                                <option value="Tordher">Tordher</option>
                                                <option value="" disabled>Balochistan Cities</option>
                                                <option value="Awaran">Awaran</option>
                                                <option value="Barkhan">Barkhan</option>
                                                <option value="Chagai">Chagai</option>
                                                <option value="Dera Bugti">Dera Bugti</option>
                                                <option value="Gwadar">Gwadar</option>
                                                <option value="Harnai">Harnai</option>
                                                <option value="Jafarabad">Jafarabad</option>
                                                <option value="Jhal Magsi">Jhal Magsi</option>
                                                <option value="Kacchi">Kacchi</option>
                                                <option value="Kalat">Kalat</option>
                                                <option value="Kech">Kech</option>
                                                <option value="Kharan">Kharan</option>
                                                <option value="Khuzdar">Khuzdar</option>
                                                <option value="Killa Abdullah">Killa Abdullah</option>
                                                <option value="Killa Saifullah">Killa Saifullah</option>
                                                <option value="Kohlu">Kohlu</option>
                                                <option value="Lasbela">Lasbela</option>
                                                <option value="Lehri">Lehri</option>
                                                <option value="Loralai">Loralai</option>
                                                <option value="Mastung">Mastung</option>
                                                <option value="Musakhel">Musakhel</option>
                                                <option value="Nasirabad">Nasirabad</option>
                                                <option value="Nushki">Nushki</option>
                                                <option value="Panjgur">Panjgur</option>
                                                <option value="Pishin Valley">Pishin Valley</option>
                                                <option value="Quetta">Quetta</option>
                                                <option value="Sherani">Sherani</option>
                                                <option value="Sibi">Sibi</option>
                                                <option value="Sohbatpur">Sohbatpur</option>
                                                <option value="Washuk">Washuk</option>
                                                <option value="Zhob">Zhob</option>
                                                <option value="Ziarat">Ziarat</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="attribute">Price:</label>
                                                    <input type="text" id="cPrice" value="" name="price" class="form-control" placeholder="Enter price"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button> 
                            </form>
                        </div>
                        
                            
                            
                        
                    </div>
                </div>
            </div>

            <!-- Edit Weight Modal -->
            <div class="modal fade" id="weightModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Weight</h4>
                        </div>
                        <form id="edit" action="<?php echo e(route('ds.shipping.editWeight')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="editWeightId" name="id">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="attribute">Min</label>
                                            <input type="number" id="min" value="" name="min" class="form-control" placeholder="Enter Minimum range"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="attribute">Max</label>
                                            <input type="number" id="max" value="" name="max" class="form-control" placeholder="Enter Maximum range"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                            <div class="form-line">
                                        <label for="attribute">Price:</label>
                                            <input type="text" id="wPrice" value="" name="price" class="form-control" placeholder="Enter price"/>
                                    </div>
                                </div>
                                
                            </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                            <div class="form-line">
                                            <button type="submit" class="btn btn-primary">Submit</button>  
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                        <!-- #END# Exportable Table -->
            </div>
    </section>

    
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
$('.editWeight').click(function(){
     console.log("clicked");
      var id =$(this).attr('data-id');
     console.log(id);
     

     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'get',
        url:'shipping/editWeight-form/'+id,
        
        success:function(response){
          console.log(response);

             $('#min').val(response.min);
             $('#max').val(response.max);
             $('#wPrice').val(response.price);
            
             $('#editWeightId').val(response.id);
        }
    });
});
$('.editCity').click(function(){
     
    console.log('clicked');
      var id =$(this).attr('data-id');
      console.log(id);
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'get',
        url:'shipping/editCity-form/'+id,
       
        success:function(response){
                 console.log(response.name);
             $('#name').val(response.name);

             $('#cPrice').val(response.price);
            
             $('#editCityId').val(response.id);
        }
    });
});

</script>
    <!-- Demo Js -->
    <script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\pakcompany2\resources\views/admin/shipping/shipping.blade.php ENDPATH**/ ?>