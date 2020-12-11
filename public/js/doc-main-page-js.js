
<script>
function addmedicine() {
var med_id = $('#selectmed').val();
var dosage = $('#system').val();
//added_med.empty();
$.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });
 $.ajax({
 url: "{{url('getmedicinename')}}"+'/'+med_id,
 type: 'get',
 dataType: 'json',
 success: function(response) {
 var len = 0;
 var json = '';
 if (response['data'] != null) {
     len = response['data'].length;
     json = response['data'];
     let added_med = $("#added_med");
     added_med = added_med.append($('<h5></h5>').attr('id', added_med).attr('value', json.id).text("Name: "+json.name+" Dosage: "+dosage))
   }
 }
});
}

function searchmedicinepot() {
var med_id = $("#selectmed").val();
var pat_id = $("#pid").val();
$('#addMed').css('display', 'block');
$.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });
 $.ajax({
 url: "{{url('searchmedicine')}}"+'/'+med_id,
 type: 'get',
 dataType: 'json',
 success: function(response) {
 var len = 0;
 var json = '';
 //console.log(response);
 if (response['data'] != null) {
   len = response['data'].length;
   json = response['data'];
   }
 if(len > 0) {
     //console.log(json);
     $('#system').css('display', 'block');
     //$('#system').empty();
     $('#system').append(json.map(function(sObj){
       return '<option id="'+sObj.id+'">'+ sObj.dosage +'</option>'
     }));
   }
 }
});
}

function patientselected(pid, pfn, pln, p_age, pdob, pguard_no) {
let added_med = $("#added_med");
added_med.empty();
$('#pat_v_histories').css("display","none");
$('#pat_v_history_detail_left').css("display","none");
let p_list_left = $("#pat_v_histories");
let p_list_left_details = $("#pat_v_history_detail_left");
let p_list_right = $("#pat_v_history_detail_right");
p_list_right.empty();
p_list_left.empty();
p_list_left_details.empty();
$("#pid").text(pid);
$("#pfn").text(pfn);
$("#pln").text(pln);
$("#p_age").text(p_age);
$("#pdob").text(pdob);
$("#pguard_no").text(pguard_no);
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
  url: "{{url('vh_and_patient')}}"+'/'+pid,
  type: 'get',
  dataType: 'json',
  success: function(response) {
  var len = 0;
  var json = '';
  //console.log(response);
  if (response['data'] != null) {
    len = response['data'].length;
    json = response['data'];
    }
  if(len > 0) {
      //console.log(json.head_size);
      $("#head_size").text(json.head_size);
      $("#length").text(json.length);
      $("#weight").text(json.weight);
      $("#temp").text(json.temperature);
      $("#v_type").text(json.other);
      $("#date").text(json.date);
      ShowVisitHistories(pid);
      getMedicalHistories(pid);
    }
  }
});
}

function ShowVisitHistories(pid) {
//$('#pat_v_histories').css("display","block");
//$('#pat_v_history_detail_left').css("display","block");
$('#med_histories').css("display","none");
$('#pat_vacc_histories').css("display","none");
$('#footer').css("display","block");

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
  url: "{{url('vh_patient')}}"+'/'+pid,
  type: 'get',
  dataType: 'json',
  success: function(response) {
  var len = 0;
  var json = '';
  if (response['data'] != null) {
    len = response['data'].length;
    json = response['data'];
    }
  if(len > 0) {
    let p_list_left = $("#pat_v_histories");
    p_list_left.empty();
    $.each(json, function (key, entry) {
      p_list_left = p_list_left.append($('<h5></h5>').attr('id', entry.id).attr('value', entry.date).text(entry.date))
     })
   }
  }
  });
}
$(document).on("click","#pat_v_histories", function (event) {
   //console.log("vh_id " + event.target.id);
   let vh_id = event.target.id;
   $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
   $.ajax({
   url: "{{url('specific_vh_patient')}}"+'/'+vh_id,
   type: 'get',
   dataType: 'json',
   success: function(response) {
   var len = 0;
   var json = '';
   if (response['data'] != null) {
     len = response['data'].length;
     json = response['data'];
     //console.log(json);
    }
   if (len > 0) {
     let p_list = $("#pat_v_history_details");
     //p_list.empty();
     //p_list = $("#pat_v_history_details").attr("class", "card-pvhd");
     //$("#pat_v_history_detail_left").attr('class',"material-icons print");
     let p_list_left = $("#pat_v_history_detail_left");
     p_list_left.empty();
     p_list_left = $("#pat_v_history_detail_left").attr("class", "split left");
     p_list_left = p_list_left.append($('<h5></h5>').text("Visit Date: " + json.date).css('text-align','left').css('margin-left', '25px'))
     p_list_left = p_list_left.append($('<h5></h5>').text("Head Size: " + json.head_size).css('text-align','left').css('margin-left', '25px'))
     p_list_left = p_list_left.append($('<h5></h5>').text("Length: " + json.length).css('text-align','left').css('margin-left', '25px'))
     p_list_left = p_list_left.append($('<h5></h5>').text("Weight: " + json.weight).css('text-align','left').css('margin-left', '25px'))
     p_list_left = p_list_left.append($('<h5></h5>').text("Temperature: " + json.temperature).css('text-align','left').css('margin-left', '25px'))
     p_list_left = p_list_left.append($('<i></i>').attr("class", "material-icons txtsms print email").css('float','left').css('padding','5px').text("txtsms "+"print "+"email "))

     let p_list_right = $("#pat_v_history_detail_right");
     p_list_right.empty();
     //$("#pat_v_history_detail_left").attr('class',"material-icons print");
     p_list_right = $("#pat_v_history_detail_right").attr("class", "split right")
     p_list_right = p_list_right.append($('<h5></h5>').text("Medicines Suggested:").css('font-style','bold'))
     }
   }
 });
});


function getMedicalHistories(pid) {
 $('#pat_v_histories').css("display","none");
 $('#pat_v_history_detail_left').css("display","none");
 $('#med_histories').css("display","none");
 $('#pat_vacc_histories').css("display","none");
 $('#footer').css("display","block");
  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
      url: "{{url('mh_patient')}}"+'/'+pid,
      type: 'get',
      dataType: 'json',
      success: function(response) {
      var len = 0;
      var json = '';
      if (response['data'] != null) {
        len = response['data'].length;
        json = response['data'];
        }
      if(len > 0) {
        console.log(json);
        let med_histories = $("#med_histories");
        med_histories.empty();
        $.each(json, function (key, entry) {
          med_histories = med_histories.append($('<h5></h5>').attr('id', entry.id).text(entry.dname + " " + entry.disease_desc))
         })
       }
      }
      });
   }

   $(document).on("click","#pat_v_histories", function (event) {
       //console.log("vh_id " + event.target.id);
       let vh_id = event.target.id;
       $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
       });
       $.ajax({
       url: "{{url('specific_vh_patient')}}"+'/'+vh_id,
       type: 'get',
       dataType: 'json',
       success: function(response) {
       var len = 0;
       var json = '';
       if (response['data'] != null) {
         len = response['data'].length;
         json = response['data'];
         //console.log(json);
        }
       if (len > 0) {
         let p_list = $("#pat_v_history_details");
         //p_list.empty();
         //p_list = $("#pat_v_history_details").attr("class", "card-pvhd");
         //$("#pat_v_history_detail_left").attr('class',"material-icons print");
         let p_list_left = $("#pat_v_history_detail_left");
         p_list_left.empty();
         p_list_left = $("#pat_v_history_detail_left").attr("class", "split left");
         p_list_left = p_list_left.append($('<h5></h5>').text("Visit Date: " + json.date).css('text-align','left').css('margin-left', '25px'))
         p_list_left = p_list_left.append($('<h5></h5>').text("Head Size: " + json.head_size).css('text-align','left').css('margin-left', '25px'))
         p_list_left = p_list_left.append($('<h5></h5>').text("Length: " + json.length).css('text-align','left').css('margin-left', '25px'))
         p_list_left = p_list_left.append($('<h5></h5>').text("Weight: " + json.weight).css('text-align','left').css('margin-left', '25px'))
         p_list_left = p_list_left.append($('<h5></h5>').text("Temperature: " + json.temperature).css('text-align','left').css('margin-left', '25px'))
         p_list_left = p_list_left.append($('<i></i>').attr("class", "material-icons txtsms print email").css('float','left').css('padding','5px').text("txtsms "+"print "+"email "))

         let p_list_right = $("#pat_v_history_detail_right");
         p_list_right.empty();
         //$("#pat_v_history_detail_left").attr('class',"material-icons print");
         p_list_right = $("#pat_v_history_detail_right").attr("class", "split right")
         p_list_right = p_list_right.append($('<h5></h5>').text("Medicines Suggested:").css('font-style','bold'))
         }
       }
     });
   });

function patientsdatajson() {
     $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
     $.ajax({
       url: "{{url('patientsdatajson')}}",
       type: 'get',
       dataType: 'json',
       success: function(response) {
         var len = 0;
         //console.log(len);
         var json = '';
         console.log(response);
         if (response['data'] != null) {
           len = response['data'].length;
           //console.log(len);
           json = response['data'];
         }
         if(len > 0) {
           //console.log(json.head_size);
           //console.log(len);
           //json.forEach(function(post) {
           // do something
           //  console.log(post);
           //});
         }
       }
     });
   }
function patientsdatajson() {
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{url('patientsdatajson')}}",
        type: 'get',
        dataType: 'json',
        success: function(response) {
        var len = 0;
        //console.log(len);
        var json = '';
        //console.log(response);
        if (response['data'] != null) {
          len = response['data'].length;
          //console.log(len);
            json = response['data'];
          }
        if(len > 0) {
            //console.log(json.head_size);
            //console.log(len);
              //json.forEach(function(post) {
                 // do something
               //  console.log(post);
              //});
          }
        }
      });
 }

//from recep
function addmorehistories() {
window.location = "{{url('addmedicalhistory/' . $patient->id)}}";
}

function refreshpage() {
window.location = "{{url('TodocMainPage')}}"+'/'+$('#pid').text();
}

function editvaccinationhistory() {
if($("#pid").text()){
window.location = "{{url('editvaccinationhistorydoc')}}"+'/'+$("#pid").text();
}
}
// When the user clicks on div, open the popup
function myFunction(c_id) {
for ($j=0; $j<100; $j++){
if(c_id == $j) {
 var popup = document.getElementById($j);
 popup.classList.toggle("show");
}
}
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

function schedulingpatient() {
window.location = "{{url('schedulingpatient/' . $patient->id)}}";
}

function editingpatient() {
window.location = "{{url('editingpatient/' . $patient->id)}}";
}

function SchedulePatVisitStore() {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var head_size = $('#head_size').val();
var length = $('#length').val();
var weight = $('#weight').val();
var temperature = $('#temperature').val();
var v_type = $('#v_type').val();

var date = current_date();

//console.log(head_size + " " + length + " " + weight + " " + temperature + " " + date);
$.ajax({
type:'POST',
url:"{{url('addingpatientvh/'.$patient->id)}}",
data: {
head_size: head_size,
length: length,
weight: weight,
temperature: temperature,
"other": v_type,
date: date,
},
success:function(data) {
 alert("Patient visit added successfully!");
 location.reload();
}
});
}

function displayBlockVisitHistories() {
//console.log($('#pid').text());
ShowVisitHistories($('#pid').text());
getMedicalHistories($('#pid').text());
$('#pat_v_histories').css("display","block");
$('#pat_v_history_detail_left').css("display","block");
$('#pat_v_history_detail_right').css("display","block");
$('#med_histories').css("display","none");
$('#pat_vacc_histories').css("display","none");
}

function ShowMedicalHistories() {
ShowVisitHistories($('#pid').text());
getMedicalHistories($('#pid').text());
$('#pat_v_histories').css("display","none");
$('#pat_v_history_detail_left').css("display","none");
$('#pat_v_history_detail_right').css("display","none");
$('#med_histories').css("display","block");
$('#pat_vacc_histories').css("display","none");
$('#footer').css("display","block");
}

function ShowVaccinationHistories() {
$('#pat_v_histories').css("display","none");
$('#pat_v_history_detail_left').css("display","none");
$('#pat_v_history_detail_right').css("display","none");
$('#med_histories').css("display","none");
$('#pat_vacc_histories').css("display","block");
$('#footer').css("display","none");
}

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}

function FinalVisitHistoryStore() {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var pid = $('#pid').text();
var head_size = $('#head_size').text();
var length = $('#length').text();
var weight = $('#weight').text();
if($('#temperature').text()) {
var temperature = $('#temperature').text();
} else {
var temperature = "_";
}
var v_type = $('#v_type').text();
var medicine = $('#added_med').text();
var dosage = $('#system').val();
if ($('#docnote').val()) {
var note = $('#docnote').val();
} else {
var note = "_";
}
//if(temperature==null){
//    temperature = "_";
//  }
var date = $('#date').text();
console.log(dosage);

//console.log(head_size + " " + length + " " + weight + " " + temperature + " " + date);
$.ajax({
type:'POST',
url:"{{url('finalvisithistorystore')}}",
data: {
patient_id: pid,
date: date,
head_size: head_size,
length: length,
weight: weight,
temperature: temperature,
v_type: v_type,
medicine: medicine,
dosage: dosage,
note: note,
},
success:function(data) {
 alert("Patient visit added successfully!");
 location.reload();
}
});
}

</script>
