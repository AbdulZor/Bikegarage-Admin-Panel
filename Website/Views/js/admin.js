// Execute code after the page is done loading
$(document).ready(function () {
    $('#foutMeldingAdminToevoegen').delay(3000).fadeOut("slow");

    $(".verwijderAdmin-button").click(function (e) {
        $thisRedButton = $(this);
        var emailAddress = $thisRedButton.closest('tr').find('td.email-column').attr('data-email');

        $('.delete-admin').attr('data-email', emailAddress);
    });

    // Look for click events on '.delete-admin' element
    $(".delete-admin").click(function (e) {
        var emailAddress = $(this).attr('data-email');

        // Whatever the browser does normally on this click event,
        // prevent it from happening and continue executing our code
        e.preventDefault();

        // Perform a POST request in the background by running an AJAX request
        $.ajax({
            type: 'POST', // Let jQuery know we want to perform a POST request
            url: '../Views/admin.php', // The script that needs to be run
            data: {'email': emailAddress}, // Get email address
            success: function () {
                console.log("Process went successful");
                $("td.email-column[data-email='" + emailAddress + "']").closest('tr').fadeOut();
            },
            error: function () {
                console.log("Oops! Something happened");
            }
        });
    });

});