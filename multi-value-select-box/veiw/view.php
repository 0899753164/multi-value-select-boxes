



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <select class="js-example-disabled-results get-drugName" name="displayDrug[]" id="displayDrug" style="width: 100%;" multiple="multiple">
        <option value="">กรุณาเลือก</option>
    </select>

<!-- select2 plugin ref.https://select2.org/options -->
<script>
    var $disabledResults = $(".js-example-disabled-results");
    $disabledResults.select2();
</script>  
<script>
$(document).ready(function(e) {
    $('#btn_reload').click(function() {
        location.reload();
    });
    // call ชื่อยา
    $.ajax({
        url : "<?php echo base_url("Product/show"); ?>",
        type: "POST",
        chache :false,
        data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
        success:function(data){
            var result = $.parseJSON(data);
            var renderDrug = '';
            $.each(result, function(key, value) {
                renderDrug += ('<option value="'+value.pbarcode+'">' + value.pId + ' | ' +value.pNameTH+ '</option>');
            });
            $("#displayDrug").html(renderDrug); // display output drug name select option tag
        }
    });
    // onchange option:selected by drug id | ค้นหาชื่อยา
    $(document).on("change", ".get-drugName", function (event) {
        event.preventDefault();
        var drugID = $(this).val();
        $("#drug_id").val(drugID); // output html value
        // get option:selected value and combine to array
        var  val1= $("select[name=\'displayDrug[]\']").map(function() {
            return $(this).val();
        }).toArray();
        // btn_addon
        $(document).on("click", "#btn_addon", function (e) {
            e.preventDefault();
            var jsonString = JSON.stringify(val1);
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("Interaction/getId"); ?>",
                cache: false,
                data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',query: jsonString},
                success:function(data)
                {
                    var obj = $.parseJSON(data);
                    var renderDrugItem = '<div style="height: 200%;">';
                    // looping json multidimensional array using jquery
                    $.each(obj, function (i) {
                        $.each(this, function (key, value) {
                            {
                                renderDrugItem += ('<tr height="30" class="tr_hover tr1 dis-detail" data-id="'+value.pbarcode+'" >');
                                renderDrugItem += ('<td align="center">' + value.pbarcode + '</td>');
                                renderDrugItem += ('<td align="left">' + value.pNameTH + '</td>');
                                renderDrugItem += ('</tr>');
                            }
                        });
                    });
                    renderDrugItem += '</div>';
                    $("#displayDrugItem").html(renderDrugItem); // display  out put
                }
            });
        });
    });
});
</script>
</body>
</html>