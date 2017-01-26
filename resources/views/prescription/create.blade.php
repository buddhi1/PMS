@extends('layouts.app')

@section('content')
<h3>E-Prescription</h3>
@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
@if(count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)          
                <li> {{ $error }} </li>         
        @endforeach
    </ul>
</div>
@endif
    <!-- <form method="POST" action="{{ url('doctor/prescription') }}" >
    {{ csrf_field() }}
        <div>
            <div>
                <label>Patient NIC</label>
                <select name="patient_id">
                    @foreach($patients as $patient)
                    <option value=" {{ $patient->id }} "> {{ $patient->nic }} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Medication</label>
                <input type="text" required="required" name="medication"/>
            </div>
            <div>
                <label>Comments</label>
                <textarea name="comments"></textarea>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
    </form> -->

    <!-- begin:add medicine into database -->
    <div class="container col-xs-8">
        <!-- <h2>Prescription</h2> -->

        <form method="POST" action="{{ url('doctor/prescription') }}" >
        {{ csrf_field() }}
            <div class="form-group row">
                <div class="col-sm-4"><span style="color: red">*</span><label> Patient Name : </label></div>
                <div class="col-sm-5">
                    <select class="form-control" id="medi_name" name="patient_id">
                        <option selected>--Select Patient--</option>
                        @foreach($patients as $patient)
                            <option value=" {{ $patient->id }} "> {{ $patient->nic }} </option>
                        @endforeach
                    </select>  
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"><span style="color: red">*</span><label> Medicine Name : </label></div>
                <div class="col-sm-5">
                    <select class="form-control" id="medicine_name" name="medicine_name">
                        <option selected>--Select Medicine--</option>
                        @foreach($medicines as $medicine)
                            <option value=" {{ $medicine->id }} "> {{ $medicine->name }}[ {{ $medicine->brand_name }} ] </option>
                        @endforeach
                    </select>  
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"><span style="color: red">*</span><label> Dose (mg) : </label></div>
                <div class="col-sm-5"><input type="text" class="form-control" name="medi_dose" id="medi_dose" placeholder="Enter dose" required></div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"><span style="color: red">*</span><label> Amount of tablets : </label></div>
                <div class="col-sm-5"><input type="number" class="form-control" name="medi_tablet" id="medi_tablet" min="1" required></div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"><span style="color: red">*</span><label> Times per Day : </label></div>
                <div class="col-sm-5">
                    <select class="form-control" id="medi_time">
                        <option selected>--Select times--</option>
                        <option>Once a day</option>
                        <option>Twice a day</option>
                        <option>Three times</option>
                        <option>Every 6 hours</option>
                        <option>Every 8 hours</option>
                        <option>Only Night</option>
                        <option>Only in the morning</option>
                    </select>  
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"><span style="color: red">*</span><label> Usage : </label></div>
                <div class="col-sm-5">   
                    <input type="radio" name="medi_use" id="medi_use1" value="before meal" required>Before meal
                    &nbsp;<input type="radio" name="medi_use" id="medi_use2" value="after meal" required checked="checked">After meal
                </div>
            </div>

             <div class="form-group ">
                <button type="button" onclick="getMedication()" class="btn btn-default">Add Medicine</button>
                <button type="button" onclick="clearMedication()" class="btn btn-default">Reset</button>
            </div>
        
<!-- end:add medicine into database -->

<!-- begin: view, edit, delete medicine in table -->

        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 id="myModalLabel">Delete</h3>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
                        </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"><span style="color: red">*</span><label> Medication : </label></div>
            <div class="col-sm-8">
                <textarea rows="5" class="form-control" id="medication" name="medication" noresize="noresize"></textarea>
            </div>
        </div>

        <!-- <table class="table table-striped table-hover table-users">
                <thead>
                    <tr>
                        
                        <th class="hidden-phone">Medicine Name</th>
                        <th>Dose</th>
                        <th>Amount of Tablets</th>
                        <th>Times per Day</th>
                        <th>Usage</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                    <tr>
                        
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                      
                                            
                        <td><a class="btn btn-warning" href="{site_url()}admin/editFront/2">Edit</a></td>

                        <td><a href="#" class="btn btn-danger" role="button" data-title="raw 1" data-id="1">Delete</a></td>
                    </tr>
                    <tr>
                        
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                      
                        <td><a class="btn btn-warning" href="{site_url()}admin/editFront/2">Edit</a></td>

                        <td><a href="#" class="btn btn-danger" role="button" data-title="kitty" data-id="2">Delete</a></td>
                    </tr>
                
                   </tbody>

            </table> -->

<!-- end: view, edit, delete medicine in table -->
        <div id="printdiv" class="form-group">
            <label>Comments</label>
            <textarea name="comments" class="form-control"></textarea>
        </div>
        
<!-- begin: find the location -->
        <div>
            <button type="submit" class="btn btn-default">Save Medicine</button>
            <button onclick="myFunction()"  class="btn btn-default">Print Prescription </button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
<!-- end: find the location -->
    </div>
    <br>
</form>


<!--begin: js for print prescription -->
<script type="text/javascript">
    function myFunction() {
        div('printdiv').print();
    }

    // medication class definition
    function Medication(medId, medName, medDose, tabAmmount, medShed, medUsage){

        // Add object properties like this
        this.medId = medId;
        this.medName = medName;
        this.medDose = medDose;
        this.tabAmmount = tabAmmount;
        this.medShed = medShed;
        this.medUsage = medUsage;
    }

    var getMedication = function(){
        var med_id = document.getElementById('medicine_name').value;
        var e = document.getElementById("medicine_name");
        var med_name = e.options[e.selectedIndex].text;
        var med_dose = document.getElementById('medi_dose').value;
        var tablet_amount = document.getElementById('medi_tablet').value;
        // var med_shed = document.getElementById('medi_time').selectedIndex.value;

        var e = document.getElementById("medi_time");
        var med_shed = e.options[e.selectedIndex].value;

        if (document.getElementById('medi_use1').checked) {
            var med_usage = document.getElementById("medi_use1").value;
        }
        else
        {
            var med_usage = document.getElementById("medi_use2").value;
        }
        
        med1 = new Medication(med_id, med_name, med_dose, tablet_amount, med_shed, med_usage);
        console.log(med1);

        var info = "#"+med1.medId+"; "+med1.medName+"; "+med1.medDose+"; "+med1.tabAmmount+"; "+med1.medShed+"; "+med1.medUsage;
        console.log(info);
        document.getElementById('medication').value += info + '\n';
    }

    var clearMedication = function(){
        document.getElementById('medication').value = " ";
    }
</script>


@stop