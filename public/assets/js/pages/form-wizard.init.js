$(function () {
    $("#basic-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide",
        labels: {
            next: "Selanjutnya",
            previous:'Sebelumnya',
            finish:'Simpan'
        },
        onFinished: function () {
            $("#form-create").submit();
        },
    }),
        $("#basic-update").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slide",
            labels: {
                next: "Selanjutnya",
                previous:'Sebelumnya',
                finish:'Simpan'
            },
            onFinished: function () {
                $("#form-update").submit();
            },
        }),
        $("#vertical-example").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slide",
            stepsOrientation: "vertical",
        });
});
