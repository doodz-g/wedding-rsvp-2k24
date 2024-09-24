$(document).ready(function () {
    // Set the date we're counting down to
    var countDownDate = new Date("Dec 10, 2024 16:00:00").getTime();

    // Update the count down every 1 second
    var countime = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var timeleft = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        $("#counter").html('<div class="time-unit"><sup class="fc-dg"><strong>Days</strong></sup></br><h3>' + days + '</h3></div>' +
            '<div class="time-unit"><sup class="fc-dg"><strong>Hours</strong></sup></br><h3>' + hours + '</h3></div>' +
            '<div class="time-unit"><sup class="fc-dg"><strong>Min</strong></sup></br><h3>' + minutes + '</h3></div>' +
            '<div class="time-unit"><sup class="fc-dg"><strong>Sec</strong></sup></br><h3>' + seconds + '</h3></div>');

        // If the count down is over, write some text 
        if (timeleft < 0) {
            clearInterval(countime);
            $("#counter").html('EXPIRED');
        }
    }, 1000);
});