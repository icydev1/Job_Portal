
function searchJobFilter() {
    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/GetJobFilter`;

    // let search = $('#freeSearch').val();
    // let orderBy = $('#orderBy').val();

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

        $.ajax({
            type: "POST",
            url: url,
            data: {
                // search: search,
                dateposted:dateposted,
                // orderBy:orderBy,
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

                if(resp){
                    $('#hideJob').hide();
                    $('#searchJob').html(resp);
                }
            },
        });
    }



