// const base_url = $('meta[name="base-url"]').attr("content");
// const token = $('meta[name="csrf-token"]').attr("content");

function searchJobFilter() {
    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/GetJobFilter`;

    let search = $('#freeSearch').val();
    let orderBy = $('#orderBy').val();

       var dateposted = [];
        $.each($("input[name='time[]']:checked"), function() {
          dateposted.push($(this).val());
        });

        var jobcat = [];
        $.each($("input[name='jobcat[]']:checked"), function() {
            jobcat.push($(this).val());
          });

        var jobshift = [];
        $.each($("input[name='jobshift[]']:checked"), function() {
            jobshift.push($(this).val());
          });

        var experience = [];
        $.each($("input[name='experience[]']:checked"), function() {
            experience.push($(this).val());
          });

        var salary = [];
        $.each($("input[name='salary[]']:checked"), function() {
            salary.push($(this).val());
          });

        var qualification = [];
        $.each($("input[name='qualification[]']:checked"), function() {
            qualification.push($(this).val());
          });

    if(search == "" && orderBy == "" && qualification == "" && dateposted == "" && jobcat == "" && jobshift == "" && experience =="" && salary == ""){

        // $('#search').html('<center><span><h5>No User Found</h5></span></center>');

    }else{
        $.ajax({
            type: "POST",
            url: url,
            data: {
                search: search,
                dateposted:dateposted,
                orderBy:orderBy,
                qualification:qualification,
                jobcat:jobcat,
                experience:experience,
                salary:salary,
                jobshift:jobshift
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType:'html',

            success: function (resp) {

console.log(resp);

                if(resp){
                    $('#hideJob').hide();
                    $('#searchJob').html(resp);
                }
            },
        });
    }


}
