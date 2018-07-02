

function quick_launch() {
    let spinner = jQuery('#spinner')
    spinner.append('<img style="height:1.5em;" src="'+ wpApiDemo.images_uri +'spinner.svg" />');

    jQuery.ajax({
        type: "POST",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        url: wpApiDemo.root + 'dt_demo/v1/quick_launch/contacts',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-WP-Nonce', wpApiDemo.nonce);
        },
    })
    .done(function (data) {
        console.log( data )
        spinner.empty()
    })
    .fail(function (err) {
        console.log("error")
        console.log(err)
        spinner.empty()
        jQuery("#prepared_data_errors").append(err.responseJSON.message)
    })

}

function delete_prepared_data() {
    let spinner = jQuery('#spinner')
    spinner.append('<img style="height:1.5em;" src="'+ wpApiDemo.images_uri +'spinner.svg" />');

    jQuery.ajax({
        method: "DELETE",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        url: wpApiDemo.root + 'dt_demo/v1/quick_launch/contacts',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-WP-Nonce', wpApiDemo.nonce);
        },
    })
    .done(function (data) {
        console.log( data )
        spinner.empty()
    })
    .fail(function (err) {
        console.log("error")
        console.log(err)
        spinner.empty()
        jQuery("#prepared_data_errors").append(err.responseJSON.message)
    })

}
