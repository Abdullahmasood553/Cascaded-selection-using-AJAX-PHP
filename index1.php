



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h3 class="text-center bg-primary p-4">Student Registration</h3>


    <div class="container">
    <form  method="POST" id="addStudent">  
    <input type="hidden" name="action" value="getStudents">
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                <label>Select Class</label>
                <select class="form-control" name="class" id="class">
                    <option>9</option>
                    <option>10</option>
                    </select>
                </div>
 

    
                <div class="col-md-3">
                <label>Select Section</label>
                <select class="form-control" name="section" id="section">
                    <option>A</option>
                    <option>B</option>
                </select>
                </div>
           


            <div class="col-md-3">
            <label>Select Group</label>
                <select class="form-control" name="groups" id="groups">
                    <option value="male">Boys</option>
                    <option value="female">Girls</option>
                </select>
            </div>
        </div>
    </div>
    <input type="submit" value="Submit" class="btn btn-warning">
    </form>

    <br>
    <div class="row">
       
               <div id="marksdata"></div>

       
         </div>
</div>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>


    <script>
        $(document).ready(function() {
            $('#addStudent').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: $('#addStudent').serialize(),
                dataType: 'json',
                    
                success: function(data) {
                    console.log(data);
                    alert(data);
                    if(data['status'] == "1"){
                    allhtml=  
                    
                        "<table class='table table-bordered table-responsive'><thead>"+ "<tr>"+
                          "<th scope='col'>#</th>"+
                          "<th scope='col'>First Name</th>"+
                          "<th scope='col'>Last Name</th>"+
                          "<th scope='col'>Group</th>"+
                        "</tr>"+
                    "</thead>"+
                "<tbody>";
                          
                
                        stdlist='';
                        var counter=0;
                        for(stdkey in data['std_list']) {
                        console.log(stdkey);
                                  stdlist +="<tr>"+
                                    "<td>"+(++counter)+"</td>"+
                                    "<td>"+data['std_list'][stdkey].name+"</td>"+
                                    "<td>"+data['std_list'][stdkey].class+"</td>"+
                                    "<td>"+data['std_list'][stdkey].groups+"</td>"+
                                "</tr>";
                               }
                            allhtml += stdlist+"</tbody>"+
                            "</table>";
               

                    $('#marksdata').html(allhtml);
                  }else{
                     $('#marksdata').html("No Students Found!");
                  }
               },
               error:function(){
                  alert('error');
               }
            
        });
    });
});
    </script>
</body>
</html>