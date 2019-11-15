$(document).ready(function () {
    function alertFileCreator() {
        $.ajax({
            type: 'POST',
            url: './resultaten.php',
            data: {'creator': 'yes'}
        });
    }

    function alertFileDeletor() {
        $.ajax({
            type: 'POST',
            url: './resultaten.php',
            data: {'deletor': 'yes'}
        });
    }

    $('#createCSV').on("click", () => {
        alertFileCreator();
    });
    $('#deleteCSV').on("click", () => {
        alertFileDeletor();
    });
});