$(function () {
    // alert()
    $(".btnSend").click(function (e) { 
        e.preventDefault();
        data = $("form[name=enquiryForm]").serialize()
        data1 = JSON.stringify(data)
        alert(data1)
        $.ajax({
            type: "post",
            url: "sendEmail.php",
            data: data,
            success: function (response) {
                alert(response)
            }
        });
    });
});