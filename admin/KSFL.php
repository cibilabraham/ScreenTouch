<?php
require_once('header.php');
?>

<div class="container">
    <h1>KSFL Requests</h1><br>


    <div class="table-responsive pt-4 mt-4">
        <table class="table table-striped mt-4 " width="100%" id="eventListTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Applicant Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact number</th>
                <th scope="col">Short Film Title</th>
                <th scope="col">Duration</th>
                <th scope="col">Submitted On</th>
                <th scope="col"></th>
                
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>




         
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">KSFL Request </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modalBody">
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



  </body>
</html>

<script>
    $('[name="menuIcon"]').removeClass('active');
    $('#ksflMenu').addClass('active');

    var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "June",
    "July", "Aug", "Sept", "Oct", "Nov", "Dec" ];

    $(document).ready(function() {
        getData();
    });


    function getData(){

        var postData = {
            function: 'User',
            method: "getKSFLListData",
        }

        $.ajax({
            url: 'ajaxHandler.php',
            type: 'POST',
            data: postData,
            dataType: "json",
            success: function (resp) {
                
                $('#eventListTable').DataTable().destroy();
                var eventList = resp.data;
                // console.log(resp.data);
                // $('#eventListTable').DataTable( { } );
                $('#eventListTable').DataTable({
                    "data": eventList,
                    "aaSorting": [],
                    "columns": [
                    { "data": "id",
                    
                        "render": function ( data, type, full, meta ) {
                            return  meta.row + 1;
                        }
                    },
                    
                    
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "number" },
                    { "data": "title" },
                    { "data": "duration" },
                    
                        { "data": null,
                        render: function ( data ) {
                            
                            var date = new Date(data['created_date']);

                        // Get year, month, and day part from the date
                        var year = date.toLocaleString("default", { year: "numeric" });
                        var month = date.toLocaleString("default", { month: "numeric" });
                        var day = date.toLocaleString("default", { day: "2-digit" });

                        var formattedDate = day+ ' '+ monthNames[month-1] + ' '+ year;
                            
                            
                            
                            return formattedDate;
                        }
                    },

                      
                    {"data":null,"render":function(item){
                        var str = '<span class="badge bg-primary text-white" onclick="detailedView('+item.id+');" style="cursor:pointer">Detailed view</span>';
                        return str;
                        }
                    },
             
                    
                    
                    
                    
                    ]
                });
                
            },
            error: function (x,h,r) {
            //called when there is an error
                console.log(x);
                console.log(h);
                console.log(r);
                
            }
        });


}

function detailedView(id) {

    $('#modalBody').html('');

    var postData = {
            function: 'User',
            method: "getKSFLData",
            'sel_id':id
        }

        $.ajax({
            url: 'ajaxHandler.php',
            type: 'POST',
            data: postData,
            dataType: "json",
            success: function (resp) {

                if(resp.status == 1){
              
                    var eventList = resp.data;

                    // alert(eventList['name']);
                    var tbl = "";
                  
                    tbl += '<div class="list-container">';
                    tbl += '<div class="list-title">Detailed View</div>';
                    tbl += "<ul>";
                    tbl += "<li>Applicant Name :</span> <br><b>"+eventList['name']+"</b></li>";
                    tbl += "<li>Email :</span> <br><b>"+eventList['email']+"</b></li>";
                    tbl += "<li>Address :</span> <br><b>"+eventList['address']+"</b></li>";
                    tbl += "<li>WhatsApp Number :</span> <br><b>"+eventList['whatsApp']+"</b></li>";
                    tbl += "<li>Contact number :</span> <br><b>"+eventList['number']+"</b></li>";
                    tbl += "<li>Short Film Title :</span> <br><b>"+eventList['title']+"</b></li>";
                    tbl += "<li>Cast and Crew :</span> <br><b>"+eventList['cast']+"</b></li>";
                    tbl += "<li>Duration :</span> <br><b>"+eventList['duration']+"</b></li>";
                    tbl += "<li>Name of the Screen Play / Writer :</span> <br><b>"+eventList['writer']+"</b></li>";
                    tbl += "<li>Production Banner :</span> <br><b>"+eventList['production_banner']+"</b></li>";
                    tbl += "<li>Name of the Director :</span> <br><b>"+eventList['director']+"</b></li>";
                    tbl += "<li>Name of the Makeup Artist :</span> <br><b>"+eventList['makeup_artist']+"</b></li>";
                    tbl += "<li>Name of the Editor :</span> <br><b>"+eventList['editor']+"</b></li>";
                    tbl += "<li>Name of the Art Director :</span> <br><b>"+eventList['art_director']+"</b></li>";
                    tbl += "<li>Name of the VFX artist :</span> <br><b>"+eventList['vfx_artist']+"</b></li>";
                    tbl += "<li>Name of the Poster Designer :</span> <br><b>"+eventList['designer']+"</b></li>";
                    tbl += "<li>Name of the Costumer :</span> <br><b>"+eventList['costumer']+"</b></li>";
                    tbl += "<li>Name of the DOP/Cameraman/Cinematographer :</span> <br><b>"+eventList['cameraman']+"</b></li>";

                    var list = JSON.parse(eventList['categories']);
                  
                    tbl += "<li>10 categories you would like to compete for :</span> <br><b>"+list+"</b></li>";

                    tbl += "<li>Name of the Child Artist :</span> <br><b>"+eventList['child_artist']+"</b></li>";

                    var date = new Date(eventList['production_completion_date']);

                    // Get year, month, and day part from the date
                    var year = date.toLocaleString("default", { year: "numeric" });
                    var month = date.toLocaleString("default", { month: "numeric" });
                    var day = date.toLocaleString("default", { day: "2-digit" });

                    var formattedDate = day+ ' '+ monthNames[month-1] + ' '+ year;

                    tbl += "<li>Date of Completion of Production :</span> <br><b>"+formattedDate+"</b></li>";

                    tbl += "<li>Contact Details of Producer :</span> <br><b>"+eventList['producer_contact']+"</b></li>";
                    tbl += "<li>Name of the Female Lead :</span> <br><b>"+eventList['female_lead']+"</b></li>";
                    tbl += "<li>Name of the Male Lead :</span> <br><b>"+eventList['male_lead']+"</b></li>";
                    tbl += "<li>Synopsis of the film :</span> <br><b>"+eventList['synopsis']+"</b></li>";
                    tbl += "<li>Name of the other Artistes and details :</span> <br><b>"+eventList['artistes_details']+"</b></li>";
                    tbl += "<li>Your role in this Short Film :</span> <br><b>"+eventList['role']+"</b></li>";

                    if(eventList['preview_format'] == 'Link') tbl += "<li>Check format of your Short Film Preview submitting :</span> <br><b>Online LINK</b></li>";
                    else tbl += "<li>Check format of your Short Film Preview submitting :</span> <br><b>Pen Drive (Courier)</b></li>";

                    

                    tbl += "<li>Terms and Conditions :</span> <br><b>"+eventList['tac']+"</b></li>";
                    tbl += "<li>Project Details :</span> <br><b>"+eventList['project_details']+"</b></li>";
                    tbl += "<li>Payment Screenshot :</span> <br><b><a target='_blank' href="+eventList['uploadFilePath']+">"+eventList['uploadFilePath']+"</a></b></li>";


                    tbl += "</ul>";
                    tbl += "</div>";

                    $('#modalBody').html(tbl);

                    $('#myModal').modal('show');
                    

                }


            },
            error: function (x,h,r) {
            //called when there is an error
                console.log(x);
                console.log(h);
                console.log(r);
                
            }
        });
    
}






</script>