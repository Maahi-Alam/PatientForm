<!DOCTYPE html>
<html>
<head>
    <title>Create patient form</title>
    <link rel="stylesheet" href="http://www.codermen.com/css/bootstrap.min.css">
    <script src="http://www.codermen.com/js/jquery.js"></script>
</head>
<body>
<div class="container">
    <h1> Create Patient form</h1>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 form-group" style="background-color:lavender;">
                <label for="name">Paatient Name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="col-sm-4 form-group" style="background-color:lavenderblush;">
                <label for="dob">DoB</label>
                <input type="date" class="form-control" id="dob">
            </div>
            <div class="col-sm-4 form-group" style="background-color:lavender;">
                <label for="dob">Cell No.</label>
                <input type="number" class="form-control" id="cell">
            </div>
        </div>
    </div>


    <div class="form-group purple-border">
        <label for="dieses" class="panel-heading" style="background-color:lavender;">Dises Description:</label>
        <textarea class="form-control" id="dieses" rows="3"></textarea>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:lavender;">Location:</div>
        <div class="panel-body">
            <div class="form-group">

                <select id="division" name="category_id" class="form-control" style="width:350px" >
                    <option value="" >==Division==</option>
                    @foreach($divisions as $key => $division)
                        <option value="{{$key}}"> {{$division}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">

                <select name="district" id="district" class="form-control" style="width:350px">
                    <option value="">==District==</option>
                </select>
            </div>

            <div class="form-group">

                <select name="thana" id="thana" class="form-control" style="width:350px">
                    <option value="">==Thana==</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="form-control button btn-primary" id="submit">
    </div>



</div>

<script type="text/javascript">
    $('#division').change(function(){
        var divisionID = $(this).val();
        if(divisionID){
            $.ajax({
                type:"GET",
                url:"{{url('get-district-list')}}?division_id="+divisionID,
                success:function(res){
                    if(res){
                        $("#district").empty();
                        $("#district").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#district").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#district").empty();
                    }
                }
            });
        }else{
            $("#district").empty();
            $("#thana").empty();
        }
    });
    $('#district').on('change',function(){
        var districtID = $(this).val();
        if(districtID){
            $.ajax({
                type:"GET",
                url:"{{url('get-thana-list')}}?district_id="+districtID,
                success:function(res){
                    if(res){
                        $("#thana").empty();
                        $.each(res,function(key,value){
                            $("#thana").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#thana").empty();
                    }
                }
            });
        }else{
            $("#thana").empty();
        }

    });
</script>
</body>
</html>