<!-- Bootstrap -->
   <link href="public/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="public/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <!-- NProgress -->
   <link href="public/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
   <!-- iCheck -->
   <link href="public/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
   <!-- bootstrap-wysiwyg -->
   <link href="public/gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
   <!-- Select2 -->
   <link href="public/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
   <!-- Switchery -->
   <link href="public/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
   <!-- starrr -->
   <link href="public/gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">
   <!-- bootstrap-daterangepicker -->
   <link href="public/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

                  <div style="text-align: center">
                    <br>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <h1 style="text-align: center; padding: 20">Registration Form</h1>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
