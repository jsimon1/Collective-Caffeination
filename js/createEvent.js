$(document).ready(function() {

    $("#startT").change(function() {
        alert("hi");
        var val = $(this).val();
        if (val == "AM") {
            $("#hour1").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '9'>9</option><option value = '10'>10</option><option value = '11'>11</option><option value = '12'>12</option>");
        } else if (val == "PM") {
            $("#hour1").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '12'>12</option><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option><option value = '6'>6</option>");
        }
    });

    $("#endT").change(function() {
        alert("hi");
        var val = $(this).val();
        if (val == "AM") {
            $("#hour2").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '9'>9</option><option value = '10'>10</option><option value = '11'>11</option><option value = '12'>12</option>");
        } else if (val == "PM") {
            $("#hour2").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '12'>12</option><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option><option value = '6'>6</option>");
        }
    });

});