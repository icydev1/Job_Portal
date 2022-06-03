
$(document).ready(function(){
	$(document).on('click','.signup-tab',function(e){
		e.preventDefault();
	    $('#signup-taba').tab('show');
	});

	$(document).on('click','.signin-tab',function(e){
	   	e.preventDefault();
	    $('#signin-taba').tab('show');
	});

	$(document).on('click','.forgetpass-tab',function(e){
	 	e.preventDefault();
	   	$('#forgetpass-taba').tab('show');
	});

});


// for add more resp

var x = 0;

function addResp(){

   x++;

$('#addMoreResp').append('<div class="row mt-2" id="clearResp'+x+'"> <div class="col-md-11"><input type="text" class="form-control" placeholder="Add Responsibilty List" name="resp_list[]" value=""> </div><div class="col-md-1  zoom" ><span onclick="removeResp('+x+')"  class="removeBtn"  ><i class="fa fa-trash"></i></span></div></div>');

}

function removeResp(x){



let removeRes = document.getElementById('clearResp'+x)



removeRes.remove();



}


//end for add more resp


// for add more Qualification
var y = 0;
function addQualification(){
y++;
    $('#addMoreQualification').append('<div class="row mt-2" id="removeQualification'+y+'"> <div class="col-md-11"><input type="text" class="form-control" placeholder="Add Qualifications List" name="qualification_list[]" > </div><div class="col-md-1 zoom" ><span onclick="clearQualification('+y+')" class="removeBtn" ><i class="fa fa-trash"></i></span></div></div>')

}

function clearQualification(y){

    let clearQual = document.getElementById('removeQualification'+y)
    clearQual.remove();

}

//end for add more Qualification


//for add more benefit
var z = 0;
function addBenefit(){

    z++;

    document.getElementById('addMoreBenefit').innerHTML += ('<div class="row mt-1" id="removeBenifit'+z+'"> <div class="col-md-11"><input type="text" class="form-control" placeholder="Add Benefits List" name="benefits_list[]" > </div><div class="col-md-1 zoom"><span  onclick="clearBenefit('+z+')" class="removeBtn" ><i class="fa fa-trash"></i></span></div></div>')
}


function clearBenefit(z){

    let clearBenefits = document.getElementById('removeBenifit'+z)
        clearBenefits.remove();

}

//end for add more benefit

// for download pdf

function downloadResume($id){

    let id = $id;

    let img = document.getElementById('outputResume'+id);

        let imagePath = img.getAttribute('src');
        let fileName = getFileName(imagePath);
        saveAs(imagePath, fileName);


    function getFileName(str) {
        return str.substring(str.lastIndexOf('/') + 1)
    }

}


//end for download pdf


// add logo image


    document.getElementById('addLogo').onchange = function () {
        var file=this.files[0]
             var src = URL.createObjectURL(this.files[0])
                document.getElementById('outputLogo').src = src

        }

// end  add logo image


// add toggle in modal

    function switchToggle (x) {
      x.classList.toggle("fa-toggle-on");
      let y = document.getElementById('hideDate')
      let z = document.getElementById('showTillDate')
      if(y.style.display == "block"){
        z.style.display = "block"
        y.style.display = "none"
      }else{
        y.style.display = "block"
        z.style.display = "none"
      }

    }

    // end toggle in modal






