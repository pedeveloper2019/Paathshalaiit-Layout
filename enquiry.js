$(function () {
    // alert()
    $(".btnRegister").click(function (e) { 
        e.preventDefault();
        data = $("form[name=enquiryForm]").serialize()
        // alert(data)
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