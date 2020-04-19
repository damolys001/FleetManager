$(function () {

    if ($(window).width() <= 820) { $(".loginName").css("display", "none"); }
    $(window).on('resize', function () {
        var win = $(this); //this = window
        //if (win.height() <= 820) { }
        if (win.width() <= 820) { $(".loginName").css("display", "none"); } else { $(".loginName").css("display", "block"); }
    });
    $(".tbUplaod, .tbLife,.tbMotor,.tbHome,.tbMaturity").css("display", "none");
    $('.eclaimCategory').change(function () {
        //alert($('.eclaimCategory').val());
        var myval = $('.eclaimCategory').val();

        if (myval == "Motor Claim") {
             $(".tbUplaod, .tbLife,.tbMotor,.tbHome,.tbMaturity").css("display", "none");
            $(".tbMotor").css("display", "block");
            $(".tbUplaod").css("display", "block");
        }

        if (myval == "Home Claim") {
            $(".tbUplaod, .tbLife,.tbMotor,.tbHome,.tbMaturity").css("display", "none");
            $(".tbHome").css("display", "block");
            $(".tbUplaod").css("display", "block")
        }

        if (myval == "Life Assurance Claim") {
            $(".tbUplaod, .tbLife,.tbMotor,.tbHome,.tbMaturity").css("display", "none");
            $(".tbLife").css("display", "block")
            $(".tbUplaod").css("display", "block")
        }
        if (myval == "Maturity Claim") {
            $(".tbUplaod, .tbLife,.tbMotor,.tbHome,.tbMaturity").css("display", "none");
            $(".tbMaturity").css("display", "block")
            $(".tbUplaod").css("display", "block")
        }
        if (myval == "-- Please Select --") {
            $(".tbUplaod, .tbLife,.tbMotor,.tbHome,.tbMaturity").css("display", "none");
           
        }
      





    });


   
    $(".uplaod").css("display", "none");
    $(".uplaod").click(function () { $("#tbUplaod").css("display", "block"); $(".uplaod").css("display", "none"); })

    ////ajax  on point 
    //var urllink = "life.aspx?submit=searchByName&lifeName=" + lifeName
    //$(".result2").html("<h3 style='text-align:center'><img src='images/loading.gif'/><br/>Waiting for TurnQuest</h3>");

    //$(".result2").html(result);

    //$.ajax({
    //    url: "policycount.aspx?product=motor", success: function (result) {
    //        alert(result)
    //    }
    //});


    //bring gdExist to middle
    if ($("#gdExist").height() > 10) {
        var screenh = ($(window).height() / 2) - ($("#gdExist").height() / 2)

        var gdExistH = $("#gdExist").height()
        var gdExistW = $("#gdExist").width()
        $("#gdExistCn").height(gdExistH)
        $("#gdExistCn").width(gdExistW)
        $("#gdExistCn").css("Margin-Top", screenh)
    }
    else {
        var screenh = ($(window).height() / 2) - ($("#gdlistofPolicy").height() / 2)

        var gdExistH = $("#gdlistofPolicy").height()
        var gdExistW = $("#gdlistofPolicy").width()
        $("#gdExistCn").height(gdExistH)
        $("#gdExistCn").width(gdExistW)
        $("#gdExistCn").css("Margin-Top", screenh)
    }




    //alert(screenh)



    var dteNow = new Date();
    var intYear = dteNow.getFullYear();
    var startY = intYear - 65
    var endY = intYear - 18
    var yrange = startY + ":" + endY
    /* minDate: new Date(2007, 1 - 1, 1),*/
    //for test debugin
    $("#ctl00_ContentPlaceHolder1_txtDOBCalc,#ContentPlaceHolder1_txtWebDob, #ctl00_ContentPlaceHolder1_txtCalcDOB,#ctl00_ContentPlaceHolder1_txtSearchDOB, #ctl00_ContentPlaceHolder1_txtDOB, #ctl00_ContentPlaceHolder1_txtWebDob").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",

            yearRange: yrange
        });

    //for test for life
    $("#ContentPlaceHolder1_txtDOB,#ContentPlaceHolder1_txtDOBCalc,#ContentPlaceHolder1_txtWebDob, #ContentPlaceHolder1_txtCalcDOB,#ContentPlaceHolder1_txtSearchDOB, #ContentPlaceHolder1_txtDOB, #ContentPlaceHolder1_txtWebDob").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",

            yearRange: yrange
        });




    // for debuging
    $("#ctl00_ContentPlaceHolder1_txtLifeStart,  #ctl00_ContentPlaceHolder1_txtPostponedDate #ctl00_ContentPlaceHolder1_txtInspectionDate, #ctl00_ContentPlaceHolder1_txtPostponedDate, #ctl00_ContentPlaceHolder1_txtStartDate").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",
            minDate: 0
        });

    // for life
    $("#ContentPlaceHolder1_txtLifeStart,  #ContentPlaceHolder1_txtPostponedDate #ContentPlaceHolder1_txtInspectionDate, #ContentPlaceHolder1_txtPostponedDate, #ContentPlaceHolder1_txtStartDate").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",
            minDate: 0
        });

    //for debuging
    $("#ctl00_ContentPlaceHolder1_txtBenDOB").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",
            maxDate: 0
        });

    //for life
    $("#ContentPlaceHolder1_txtBenDOB").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",
            maxDate: 0
        });


    // for debuging
    $("#ctl00_ContentPlaceHolder1_txtLifeSA, #ctl00_ContentPlaceHolder1_txtCalcValue, .commaSep, .ctl00_ContentPlaceHolder1_txtCalcValue").keyup(function () {
        //alert("jfjjf")
        //alert($('#ctl00_ContentPlaceHolder1_txtCalcValue').val().replace(/,/gi, ''))
        var sep = commaSeparateNumber(this.val().replace(/,/gi, ''))
        this.val(sep)

    });








    //for debugin
    $("#ctl00_ContentPlaceHolder1_txtInspectionDate").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",
            minDate: 0,
            maxdate: 7

        });


    //for life
    $(" #ContentPlaceHolder1_txtInspectionDate").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy",
            minDate: 0,
            maxdate: 7

        });


    ///////////Claim Date 
    //for debugin
    $("#ctl00_ContentPlaceHolder1_txtHomeLoss, #ctl00_ContentPlaceHolder1_txtIncidentDate, #ctl00_ContentPlaceHolder1_txtLossDate").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy"

        });

    $('#ctl00_ContentPlaceHolder1_txtHomeTime,#ctl00_ContentPlaceHolder1_txtTime').timepicker({ 'scrollDefault': 'now' });




    //for life
    $("#ContentPlaceHolder1_txtHomeLoss, #ContentPlaceHolder1_txtIncidentDate, #ContentPlaceHolder1_txtLossDate").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-M-yy"

        });

    $('#ContentPlaceHolder1_txtHomeTime, #ContentPlaceHolder1_txtTime').timepicker({ 'scrollDefault': 'now' });













    $("#ContentPlaceHolder1_txtDateFrom,#ContentPlaceHolder1_txtDateTo, #ctl00_ContentPlaceHolder1_txtDateFrom, #ctl00_ContentPlaceHolder1_txtDateTo").datepicker(
        {
            autoSize: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy/mm/dd",
            maxDate: 0
        });










    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
            //val =val(strToFormat.replace(/(\d)(?=(\d{3})+(?1\d))g, '$1,')); 
        }
        return val;
    }

    $("#ContentPlaceHolder1_txtWebPassword").keyup(function () {
        //alert("ssff")
        $('#result').html(checkStrength($('#ContentPlaceHolder1_txtWebPassword').val()))

    });
    $("#ContentPlaceHolder1_txtWebPasswordConfirm").keyup(function () {
        if ($("#ContentPlaceHolder1_txtWebPassword").val() == $("#ContentPlaceHolder1_txtWebPasswordConfirm").val()) {
            $('#result').html("")
        }
        else {
            $('#result').html("Must Match the privious entry")
        }
    });
    //$('.divNowahalaClientSide').css("display", "none");
    $('#ContentPlaceHolder1_ddlReferenceCalc').on('change', function () {
        if (this.value == "No-Wahala Packs") {
            $('.divNowahalaClientSide').css("display", "block"); //.fadeIn;//.css("display", "block");
        }
        else {
            $('.divNowahalaClientSide').css("display", "none"); //.fadeOut.//.css("display", "none"); 
        }

        //alert(this.value); // or $(this).val()
    });

    if ($('#ContentPlaceHolder1_ddlReferenceCalc').val() == "No-Wahala Packs") {
        $('.divNowahalaClientSide').css("display", "block"); //.fadeIn;//.css("display", "block");
    }
    else {
        $('.divNowahalaClientSide').css("display", "none"); //.fadeOut.//.css("display", "none"); 
    }




    //alert("ghgh")
    ///////password Strenght check/////////
    // $('#password')

    /*
    checkStrength is function which will do the 
    main password strength checking for us
    */

    function checkStrength(password) {
        //initial strength
        var strength = 0

        //if the password length is less than 6, return message.
        if (password.length < 6) {
            $('#result').removeClass()
            $('#result').addClass('short')
            return 'Too short'
        }

        //length is ok, lets continue.

        //if length is 8 characters or more, increase strength value
        if (password.length > 7) strength += 1

        //if password contains both lower and uppercase characters, increase strength value
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1

        //if it has numbers and characters, increase strength value
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1

        //if it has one special character, increase strength value
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1

        //if it has two special characters, increase strength value
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1

        //now we have calculated strength value, we can return messages

        //if value is less than 2
        if (strength < 2) {
            $('#result').removeClass()
            $('#result').addClass('weak')
            return 'Weak'
        }
        else if (strength == 2) {
            $('#result').removeClass()
            $('#result').addClass('good')
            return 'Good'
        }
        else {
            $('#result').removeClass()
            $('#result').addClass('strong')
            return 'Strong'
        }
    }





    $.ajax({
        url: "policycount.aspx?product=motor", success: function (result) {

            $("#motor").val(result)
            //alert ( $("#motor").val())
            //motor = motor + 0
            // alert(motor)
        }
    });

    $.ajax({
        url: "policycount.aspx?product=life", success: function (result) {
            $("#life").val(result)
        }
    });
    $.ajax({
        url: "policycount.aspx?product=home", success: function (result) {
            $("#home").val(result)

        }
    });
    $.ajax({
        url: "policycount.aspx?product=savings", success: function (result) {
            $("#savings").val(result)
        }
    });
    $.ajax({
        url: "policycount.aspx?product=education", success: function (result) {
            $("#education").val(result)
            //education = education +0
        }
    });

    $.ajax({
        url: "policycount.aspx?product=motortpl", success: function (result) {

            $("#motortpl").val(result)


            $("#MytransChart").CanvasJSChart({
                title: {
                    text: "Policy Chart",
                    fontSize: 24
                },
                axisY: {
                    title: "Products in %"
                },
                legend: {
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                {
                    type: "pie",
                    showInLegend: false,
                    toolTipContent: "{label} <br/> {y}",
                    indexLabel: "{legendText} ",
                    dataPoints: [
                        { label: "<a href='clientMotor.aspx'>Motor Insurance</a>", y: $("#motor").val(), legendText: $("#motor").val() + " Motor Insurance" },

                        { label: "<a href='clientHome.aspx'>Home Insurance</a>", y: $("#home").val(), legendText: $("#home").val() + " Home Insurance" },
                        { label: "<a href='clientEducation.aspx'>Education Insurance</a>", y: $("#education").val(), legendText: $("#education").val() + " Education Insurance" },
                        { label: "<a href='clientLife.aspx'>Life Insurance</a>", y: $("#life").val(), legendText: $("#life").val() + " Life Insurance" },
                        { label: "<a href='clientSavings.aspx'>Savings Insurance</a>", y: $("#savings").val(), legendText: $("#savings").val() + " Savings Insurance" }
                    ]
                }
                ]
            });






        }
    });
    $(".canvasjs-chart-credit").css("display", "none")







    setInterval(function () {
        //alert("fhfh")




        $.ajax({
            url: "policycount.aspx?product=motor", success: function (result) {

                $("#motor").val(result)
                //alert ( $("#motor").val())
                //motor = motor + 0
                // alert(motor)
            }
        });

        $.ajax({
            url: "policycount.aspx?product=life", success: function (result) {
                $("#life").val(result)
            }
        });
        $.ajax({
            url: "policycount.aspx?product=home", success: function (result) {
                $("#home").val(result)

            }
        });
        $.ajax({
            url: "policycount.aspx?product=savings", success: function (result) {
                $("#savings").val(result)
            }
        });
        $.ajax({
            url: "policycount.aspx?product=education", success: function (result) {
                $("#education").val(result)
                //education = education +0
            }
        });






        $("#MytransChart").CanvasJSChart({
            title: {
                text: "Policy Chart",
                fontSize: 24
            },
            axisY: {
                title: "Products in %"
            },
            legend: {
                verticalAlign: "center",
                horizontalAlign: "right"
            },
            data: [
            {
                type: "pie",
                showInLegend: false,
                toolTipContent: "{label} <br/> {y}",
                indexLabel: "{legendText}",
                dataPoints: [
                    { label: "<a href='clientMotor.aspx'>Motor Insurance</a>", y: $("#motor").val(), legendText: $("#motor").val() + " Motor Insurance Insurance" },
                    { label: "<a href='clientHome.aspx'>Home Insurance</a>", y: $("#home").val(), legendText: $("#home").val() + " Home Insurance Insurance" },
                    { label: "<a href='clientEducation.aspx'>Education Insurance</a>", y: $("#education").val(), legendText: $("#education").val() + " Education Insurance" },
                    { label: "<a href='clientLife.aspx'>Life Insurance</a>", y: $("#life").val(), legendText: $("#life").val() + " Life Insurance" },
                    { label: "<a href='clientSavings.aspx'>Savings Insurance</a>", y: $("#savings").val(), legendText: $("#savings").val() + " Savings Insurance" }
                ]
            }
            ]
        });

        $(".canvasjs-chart-credit").css("display", "none")
    }, 10000)





    $("#vail").css("z-index", "1000000000000000")

    $(".canvasjs-chart-credit").css("display", "none")


    //resize fontsize for title 

    (function ($) {
        $.fn.textfill = function (options) {
            var fontSize = options.maxFontPixels;
            var ourText = $('strong:visible:first', this);
            var maxHeight = $(this).height();
            var maxWidth = $(this).width();
            var textHeight;
            var textWidth;
            do {
                ourText.css('font-size', fontSize);
                textHeight = ourText.height();
                textWidth = ourText.width();
                fontSize = fontSize - 1;
            } while ((textHeight > maxHeight || textWidth > maxWidth) && fontSize > 3);
            return this;
        }
    })(jQuery);





})



//$(document).ready(function () {
//    $('.inputHolder').textfill({ maxFontPixels: 16 });
//});


//$(".eclaimCategory").change(function() {
//    alert( "Handler for .change() called." );})
$('#ContentPlaceHolder1_calcPrintQuote').onclick( function(){
//alert ("hdhfhs")
    window.print()

});