// Set the date we're counting down to
var countDownDate = new Date("Dec 10, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function () {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    $("#counter").html('<div style="display:inline-block; width: 100px; height: 40px; text-align: center;"><sup>Days</sup> </br><h3 class="text-white">' + days + '</h3></div>' +
        '<div style="display:inline-block; width: 100px; height: 40px; text-align: center;"><sup>Hours</sup> </br><h3 class="text-white">' + hours + '</h3></div>' +
        '<div style="display:inline-block; width: 100px; height: 40px; text-align: center;"><sup>Min</sup> </br><h3 class="text-white">' + minutes + '</h3></div>' +
        '<div style="display:inline-block; width: 100px; height: 40px; text-align: center;"><sup>Sec</sup> </br><h3 class="text-white">' + seconds + '</h3></div>');

    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);