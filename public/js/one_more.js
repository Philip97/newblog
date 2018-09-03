$(document).ready(function() {
    $('select#inp_bedrooms, select#inp_bathrooms, input#inp_zip, input#inp_email').unbind().blur(function () {
        var id = $(this).attr('id');
        var val = $(this).val();
        switch (id) {
            case 'inp_bedrooms':
                var reg_exp_bed = /^(\d)+(\.|,)?(\d)?$/;
                if (reg_exp_bed.test(val)) {
                    $(this).addClass('not-error');
                }
                else {
                    $(this).css('color', 'red');
                }
                break;
            case 'inp_bathrooms':
                var reg_exp_bath = /^(\d)+(\.|,)?(\d)?$/;
                if (reg_exp_bath.test(val)) {
                    $(this).addClass('not-error');
                }
                else {
                    $(this).css('color', 'red');
                }
                break;
            case 'inp_email':
                var reg_exp_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                if (reg_exp_email.test(val)) {
                    $(this).addClass('not-error');
                }
                else {
                    $(this).css('color', 'red');
                }
                break;
            case 'inp_zip':
                var reg_exp_zip = /^(\d){4,20}?$/;
                if (reg_exp_zip.test(val)) {
                    $(this).addClass('not-error');
                }
                else {
                    $(this).css('color', 'red');
                }
                break;
        } // end switch(...)
    });
    $('select#inp_bedrooms, select#inp_bathrooms, input#inp_zip, input#inp_email').hover(function () {
        var id = $(this).attr('id');
        var val = $(this).val();
        switch (id) {
            case 'inp_bedrooms':
                $(this).css('color', '#212529');
                break;
            case 'inp_bathrooms':

                $(this).css('color', '#212529');
                break;
            case 'inp_email':

                $(this).css('color', '#212529');
                break;
            case 'inp_zip':

                $(this).css('color', '#212529');
                break;
        } // end switch(...)
    }); // end hover()

    $('#send').click(function (e) {
        e.preventDefault();
        var not_error = $('.not-error').length;
        if (not_error == 4 )
        {
            console.log('after if');
            $('#send').unbind('click');
            $('#send').click();
        } else { console.log('form is not valid');}
    });
    // end of first page

    var web = $('.top-web > div');
    var webDiv =  web.slice(0,4).addClass('pgorressBar');
    var lastDiv = webDiv.filter(':last').css('border-right', '1px solid');
    var webP = $('.top-web div p').slice(0,4).css('margin-bottom', '0');
    $('.p').css('border-bottom', '1px solid');
    // start blur
    $('input#firstName,' +
        ' input#lastName,' +
        ' input#streetAddress,' +
        ' input#apt, input#city,' +
        ' input#homeSquare,' +
        ' input#mobPhon, ' +
        'input#dropDown_hidden').unbind().blur( function(){
        var id = $(this).attr('id');
        var val = $(this).val();
        switch(id)
        {
            case 'firstName':
                var reg_exp_firstName = /^([a-z])+(\s([a-z])+)?$/i;
                if(reg_exp_firstName.test(val))
                {
                    console.log('firstName');
                    $(this).addClass('not-error');
                }
                else
                {
                    console.log(' not firstName');
                    $(this).css('color','red');
                }
                break;
            case 'lastName':
                var reg_exp_lastName = /^([a-z])+(\s([a-z])+)?$/i;
                if(reg_exp_lastName.test(val))
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
            case 'streetAddress':
                if(val != '' && val.length > 5)
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
            case 'city':
                var reg_exp_city = /^([a-z])+(\s|-)?([a-z])*(\s|-)*([a-z])*(\s|-)*([a-z])*$/i;
                if(reg_exp_city.test(val) && val.length >= 3)
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
            case 'homeSquare':
                var reg_exp_city = /^(\d)+(\.|,)?(\d)?$/;
                if(reg_exp_city.test(val) && val.length >= 3)
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
            case 'mobPhon':
                var reg_exp_city = /^(\+)?(\d)+(\s|-)?(\d)?(\s|-)?(\d)?(\s|-)?(\d)?(\s|-)?(\d)?(\s|-)?(\d)?(\s|-)?(\d)?(\s|-)?(\d)?(\s|-)?$/;
                if(reg_exp_city.test(val) && val.length >= 5)
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
            case 'frequency':
                var reg_exp_frequency = /^([a-z])+$/i;
                if(reg_exp_frequency.test(val) && val.length >= 3)
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
            case 'date':
                var reg_exp_frequency = /^(([a-z])+(\s)?)+$/i;
                if(reg_exp_frequency.test(val) && val.length >= 3)
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
            case 'dropDown_hidden':
                var reg_exp_dropDown_hidden = /^([a-z])+((\s)+([a-z])+)?$/i;
                if(reg_exp_dropDown_hidden.test(val) && val.length >= 3)
                {
                    $(this).addClass('not-error');
                }
                else
                {
                    $(this).css('color','red');
                }
                break;
        } // end switch(...)
    });
    var radio_btn = $('[name = frequency]');
    radio_btn.unbind().click( function(){
        radio_btn.removeClass('not-error');
        $(this).addClass('not-error');
    });

    var radio_btn2 = $('[name = date]');
    radio_btn2.unbind().click( function(){
        radio_btn2.removeClass('not-error');
        $(this).addClass('not-error');
    });
    // start hover

    $('input#firstName, input#lastName, input#streetAddress, input#apt, input#city, input#homeSquare, input#mobPhon, input#frequency, input#date, input#dropDown_hidden').hover( function(){
        var id = $(this).attr('id');
        var val = $(this).val();
        switch(id)
        {
            case 'firstName':
                $(this).css('color','#212529');
                break;
            case 'lastName':
                $(this).css('color','#212529');
                break;
            case 'streetAddress':
                $(this).css('color','#212529');
                break;
            case 'apt':
                $(this).css('color','#212529');
                break;
            case 'city':
                $(this).css('color','#212529');
                break;
            case 'homeSquare':
                $(this).css('color','#212529');
                break;
            case 'mobPhon':
                $(this).css('color','#212529');
                break;
            case 'frequency':
                $(this).css('color','#212529');
                break;
            case 'date':
                $(this).css('color','#212529');
                break;
            case 'dropDown_hidden':
                $(this).css('color','#212529');
                break;
        } // end switch(...)
    });// end hover()

    $('#step3').click(function (e) {
        e.preventDefault();
        var not_error = $('.not-error').length;
        if (not_error >= 2 )
        {
            $('#step3').unbind('click');
            $('#step3').click();
        } else { console.log('form is not valid ' + not_error)}
    });

    $('input[name="advertis"]').click(function (e) {
        {
            var val = $(this)[0]['innerText'];
            console.log(val);
            var hid_inp = $('#dropDown_hidden');
            hid_inp.attr('value', val);
            $('#dropDown').addClass('not-error');
        }
    });
    var radio_btn3 = $('[name = pet]');
    radio_btn3.unbind().click( function(){
        radio_btn3.removeClass('not-error');
        $(this).addClass('not-error');
    });

    var radio_btn4 = $('[name = adult]');
    radio_btn4.unbind().click( function(){
        radio_btn4.removeClass('not-error');
        $(this).addClass('not-error');
    });

    var radio_btn5 = $('[name = children]');
    radio_btn5.unbind().click( function(){
        radio_btn5.removeClass('not-error');
        $(this).addClass('not-error');
    })

});

