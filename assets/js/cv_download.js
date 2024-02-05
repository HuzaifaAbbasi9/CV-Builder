$(document).ready(function () {

    $('.cv_downlaod').click(function () {
        const input = document.getElementById('cv_temp_1');
        var pdf = new jsPDF('p', 'pt', 'letter');
        pdf.height = 1200;
        pdf.width = 1200;
        html2canvas(input)
            .then((canvas) => {
                const imgData = canvas.toDataURL('image/png');
                const imgProps= pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save("download.pdf");
            });
        // var pdf = new jsPDF('p', 'pt', 'letter');
        // var firstPage;
        //
        // html2canvas(document.querySelector(".cv-temp")).then(canvas => {
        //     firstPage = canvas.toDataURL('image/jpeg', 1.0);
        //     // $(".download_preview").attr('src' ,firstPage);
        // });
        // console.log(firstPage);
        //
        // setTimeout(function(){
        //     pdf.addImage(firstPage, 'JPEG', 5, 5, 200, 0);
        //     console.log(firstPage);
        // }, 150);
    });
});