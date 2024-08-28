$(document).ready(function () {
    // Set the date we're counting down to
    var countDownDate = new Date("Dec 10, 2024 15:37:25").getTime();

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
        $("#counter").html('<div class="time-unit"><sup>Days</sup></br><h3 class="text-white">' + days + '</h3></div>' +
            '<div class="time-unit"><sup>Hours</sup></br><h3 class="text-white">' + hours + '</h3></div>' +
            '<div class="time-unit"><sup>Min</sup></br><h3 class="text-white">' + minutes + '</h3></div>' +
            '<div class="time-unit"><sup>Sec</sup></br><h3 class="text-white">' + seconds + '</h3></div>');

        // If the count down is over, write some text 
        if (timeleft < 0) {
            clearInterval(countime);
            $("#counter").html('EXPIRED');
        }
    }, 1000);
});