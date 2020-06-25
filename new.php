 <div class="row">
                                       
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Exam Decryptrd Id</label>
                                                    <select class="form-control custom-select" id="exam_id" name="exam_id">
                                                     <?php 
                                                     $es=new examsubjectcontroller();
                                       foreach ($b as $bl){
                                           
                                           $bb = $bl['block'];
                                          
                                       
                                       ?>
                                                   <option value="<?php echo $bb->getEncrypted_data(); ?>">
                                                   <?php
                                                   $temp=$es->my_decrypt($bb->getEncrypted_data(), $key);
                                                   $str_arr = preg_split ("/\####/", $temp);
                                                   print_r($str_arr[2]);
//                                                    echo $a;
                                                  
                                                   ?></option>
<!--                                                         <option value="1">1</option> -->
<!--                                                         <option value="2">2</option> -->
<!--                                                         <option value="3">3</option> -->
                                                        <?php }?>
                                                    </select>
                                                     
                                                    <small class="form-control-feedback"> -----Select----- </small> </div>
                                            </div>
                                          
                                        </div>